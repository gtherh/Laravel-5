<?php

namespace App\Http\Controllers;

/**
 * @package BrandController
 * @author TechVillage <support@techvill.org>
 * @contributor Sakawat Hossain Rony <[sakawat.techvill@gmail.com]>
 * @created 26-08-2021
 */

use App\DataTables\TagListDataTable;
use App\Exports\BrandListExport;
use App\Http\Controllers\Controller;
use App\Models\{
    Brand,
    Tag,
};
use Illuminate\Http\Request;
use Excel;
use Maatwebsite\Excel\Facades\Excel as FacadesExcel;

class TagController extends Controller
{
    /**
     * Brand List
     * @param TagListDataTable $dataTable
     * @return mixed
     */
    public function index(TagListDataTable $dataTable)
    {
        return $dataTable->render('admin.tags.index');
    }

    /**
     * Brand create
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store Brand
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $response = $this->messageArray(__('Invalid Request'), 'fail');
        if ($request->isMethod('post')) {

            if ($request->name_en != null && $request->name_ar != null) {
                $request->merge([
                    'name' => [
                        'en' => $request->name_en,
                        'ar' => $request->name_ar,
                    ],
                ]);
            }

            $tagId = (new Tag)->store($request->only('name',  'status'));

            $response = $this->messageArray(__('The :x has been successfully saved.', ['x' => __('Tag')]), 'success');
        }
        $this->setSessionValue($response);
        return redirect()->route('tags.index');
    }

    /**
     * Edit Brand
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        $tag = Tag::getAll()->where('id', $id)->first();
        if (empty($tag)) {
            $response = $this->messageArray(__(':x does not exist.', ['x' => __('Tag')]), 'fail');
            $this->setSessionValue($response);
            return redirect()->route('tags.index');
        }
        $data['tags'] = $tag;

        return view('admin.tags.edit', $data);
    }

    /**
     * Update Brand
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $response = $this->messageArray(__('Invalid Request'), 'fail');
        if ($request->isMethod('post')) {
            $result = $this->checkExistence($id, 'tags');
            if ($result['status'] === true) {


                $request->merge([
                    'name' => [
                        'en' => $request->name_en,
                        'ar' => $request->name_ar,
                    ],
                ]);

                if ((new Tag)->updateTag($request->only('name', 'status'), $id)) {
                    $response = $this->messageArray(__('The :x has been successfully saved.', ['x' => __('Brand')]), 'success');
                }
            } else {
                $response['message'] = $result['message'];
            }
        }
        $this->setSessionValue($response);
        return redirect()->route('tags.index');
    }

    /**
     * Remove Brand
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, $id)
    {
        $response = $this->messageArray(__('Invalid Request'), 'fail');
        if ($request->isMethod('post')) {
            $result = $this->checkExistence($id, 'tags');
            if ($result['status'] === true) {
                $response = (new Tag)->remove($id);
            } else {
                $response['message'] = $result['message'];
            }
        }

        $this->setSessionValue($response);
        return redirect()->route('tags.index');
    }

    /**
     * Brand list pdf
     * @return html static page
     */
    public function pdf()
    {
        $data['tags'] = Tag::getAll();

        return printPDF(
            $data,
            'tags_lists' . time() . '.pdf',
            'admin.tags.list_pdf',
            view('admin.tags.list_pdf', $data),
            'pdf'
        );
    }

    /**
     * Brand list csv
     * @return html static page
     */
    public function csv()
    {
        return FacadesExcel::download(new BrandListExport(), 'brands_lists' . time() . '.csv');
    }
}
