<?php
/**
 * @package BrandListDataTable
 * @author TechVillage <support@techvill.org>
 * @contributor Sakawat Hossain Rony <[sakawat.techvill@gmail.com]>
 * @contributor Al Mamun <[almamun.techvill@gmail.com]>
 * @created 25-08-2021
 * @modified 04-10-2021
 */

namespace App\DataTables;

use App\DataTables\DataTable;
use App\Models\{
    Tag
};

class TagListDataTable extends DataTable
{
    /*
    * DataTable Ajax
    *
    * @return \Yajra\DataTables\DataTableAbstract|\Yajra\DataTables\DataTables
    */
    public function ajax()
    {
        $tags = $this->query();
        return datatables()
            ->of($tags)

            ->addColumn('image', function ($tags) {
                return '<img src="' . $tags->fileUrl() . '" alt="' . __('image') . '" width="50" height="50">';
            })

            ->editColumn('name', function ($tags) {
                return '<a href="' . route('tags.edit', ['id' => $tags->id]) . '">' . wrapIt($tags->name, 10, ['columns' => 2]) . '</a>';
            })
          
            ->editColumn('status', function ($tags) {
                return statusBadges(lcfirst($tags->status));
            })->editColumn('created_at', function ($tags) {
                return $tags->format_created_at;
            })
            ->addColumn('action', function ($tags) {
                $edit = '<a title="' . __('Edit') . '" href="' . route('tags.edit', ['id' => $tags->id]) .'" class="btn btn-xs btn-primary"><i class="feather icon-edit"></i></a>&nbsp;';

                $delete = '<form method="post" action="' . route('tags.destroy', ['id' => $tags->id]) .'" id="delete-user-'. $tags->id . '" accept-charset="UTF-8" class="display_inline">
                        ' . csrf_field() . '
                        <button title="' . __('Delete') . '" class="btn btn-xs btn-danger confirm-delete" type="button" data-id=' . $tags->id . ' data-delete="user" data-label="Delete" data-bs-toggle="modal" data-bs-target="#confirmDelete" data-title="' . __('Delete :x', ['x' => __('Brand')]) . '" data-message="' . __('Are you sure to delete this?') . '">
                        <i class="feather icon-trash-2"></i>
                        </button>
                        </form>';
                $str = '';
               
                    $str .= $edit;
               
              
                    $str .= $delete;
             
                return $str;
            })

            ->rawColumns(['image', 'name', 'status', 'action'])
            ->filter(function ($instance){
                if (in_array(request('status'), getStatus())) {
                    $instance->where('status', request('status'));
                }

                if (isset(request('search')['value'])) {
                    $keyword = xss_clean(request('search')['value']);
                    if (!empty($keyword)) {
                        $instance->where(function ($query) use ($keyword) {
                            $query->WhereLike('name', $keyword)
                                ->OrWhereLike('status', $keyword);
                        });
                    }
                }
            })
            ->make(true);
    }

    /*
    * DataTable Query
    *
    * @return mixed
    */
    public function query()
    {
        $tags = Tag::query()->withCount('productTag');

        return $this->applyScopes($tags);
    }

    /*
    * DataTable HTML
    *
    * @return \Yajra\DataTables\Html\Builder
    */
    public function html()
    {
        return $this->builder()

            ->addColumn(['data' => 'image', 'name' => 'image', 'title' => __('Image'), 'orderable' => false, 'searchable' => false, 'width' => '7%'])

            ->addColumn(['data' => 'name', 'name' => 'name', 'title' => __('Name'), 'width' => '33%'])

            ->addColumn(['data' => 'status', 'name' => 'status', 'title' => __('Status'), 'width' => '15%'])

            

            ->addColumn(['data' => 'created_at', 'name' => 'created_at', 'title' => __('Created at'), 'width' => '20%'])

            ->addColumn(['data'=> 'action', 'name' => 'action', 'title' => __('Action'), 'width' => '10%',
            'visible' => true,
            'orderable' => false, 'searchable' => false])

            ->parameters(dataTableOptions());
    }

}
