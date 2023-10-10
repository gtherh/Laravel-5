@php
    $offerFlag = $item->offerCheck();
    $outOfStock = $item->isOutOfStock();
    
    $outStock = false;
    $newArrival = isset($type) && $type == 'newArrivals';
@endphp
@if ($outOfStock['isApprove'])
<div class="product-card">
    <div class="photo"></div>
    <div class="frame">
        <div class="card-info">
            <div class="info">
                <p class="text-wrapper">Chanel perfume for women imported N5</p>
                <div class="div">Nike</div>
            </div>
            <div class="price">
                <div class="div-2">
                    <div class="title">500</div>
                    <div class="title-2">SAR</div>
                </div>
                <div class="frame-2">
                    <div class="div-2">
                        <div class="title-3">900</div>
                        <div class="title-4">SAR</div>
                    </div>
                    <div class="text-wrapper-2">(Discount 40 %)</div>
                </div>
            </div>
        </div>
        <div class="frame-3">
            <div class="rate">
                <img class="star" src="{{asset('public/images/img/star.png')}}" />
                <div class="frame-4">
                    <div class="text-wrapper-3">4.9</div>
                    <div class="div-wrapper">
                        <div class="text-wrapper-4">(21 Reviews)</div>
                    </div>
                </div>
            </div>
            <div class="tags">
                <div class="tags-2">
                    <img class="icon" src="{{asset('public/images/')}}/img/icon-1.svg" />
                    <div class="label-text">24 H</div>
                </div>
                <div class="tags-3">
                    <img class="icon" src="{{asset('public/images/')}}/img/icon.svg" />
                    <p class="p"><span class="span">Save 25% with </span> <span
                            class="text-wrapper-5">SAM12</span></p>
                </div>
            </div>
        </div>
    </div>
    <div class="frame-5">
        <div class="favorite-wrapper"><img class="favorite" src="{{asset('public/images/')}}/img/favorite.png" /></div>
    </div>
</div>


    <style>
        @import url("https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css");

        * {
            -webkit-font-smoothing: antialiased;
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0px;
            height: 100%;
        }

        /* a blue color as a generic focus style */
        button:focus-visible {
            outline: 2px solid #4a90e2 !important;
            outline: -webkit-focus-ring-color auto 5px !important;
        }

        a {
            text-decoration: none;
        }

        @import url("https://fonts.googleapis.com/css?family=Roboto:500,400|Tajawal:500,700,400");

        :root {
            --x-1000: rgba(168, 186, 243, 1);
            --x-1001: rgba(228, 160, 240, 1);
            --x-1002: rgba(208, 169, 241, 1);
            --x-1110: rgba(32, 245, 249, 1);
            --x-1111: rgba(114, 210, 245, 1);
            --m3syslighton-surface: rgba(29, 27, 32, 1);
            --mockupmirror-title-font-family: "Inter-Regular", Helvetica;
            --mockupmirror-title-font-weight: 400;
            --mockupmirror-title-font-size: 35px;
            --mockupmirror-title-letter-spacing: 0px;
            --mockupmirror-title-line-height: normal;
            --mockupmirror-title-font-style: normal;
            --1: 0px 8px 24px 0px rgba(0, 0, 0, 0.1);
        }

        .product-card {
            display: inline-flex;
            flex-direction: column;
            height: 610px;
            align-items: flex-start;
            position: relative;
        }

        .product-card .photo {
            position: relative;
            width: 344px;
            height: 450px;
            background-image: url({{asset('public/images/img/photo-07.png')}});
            background-size: cover;
            background-position: 50% 50%;
        }

        .product-card .frame {
            display: flex;
            width: 344px;
            align-items: flex-start;
            justify-content: space-between;
            padding: 16px;
            position: relative;
            flex: 0 0 auto;
            background-color: #ffffff;
            border-radius: 0px 0px 24px 24px;
        }

        .product-card .card-info {
            display: inline-flex;
            flex-direction: column;
            height: 120px;
            align-items: flex-start;
            justify-content: space-between;
            position: relative;
            flex: 0 0 auto;
        }

        .product-card .info {
            display: inline-flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 2px;
            position: relative;
            flex: 0 0 auto;
        }

        .product-card .text-wrapper {
            position: relative;
            width: 172px;
            margin-top: -1px;
            font-family: "Roboto", Helvetica;
            font-weight: 500;
            color: #000000;
            font-size: 14px;
            letter-spacing: 0;
            line-height: 18px;
        }

        .product-card .div {
            position: relative;
            width: fit-content;
            font-family: "Roboto", Helvetica;
            font-weight: 400;
            color: #a3a3a3;
            font-size: 14px;
            letter-spacing: 0;
            line-height: 18px;
            white-space: nowrap;
        }

        .product-card .price {
            display: inline-flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 4px;
            position: relative;
            flex: 0 0 auto;
        }

        .product-card .div-2 {
            display: inline-flex;
            align-items: flex-start;
            position: relative;
            flex: 0 0 auto;
        }

        .product-card .title {
            position: relative;
            width: fit-content;
            margin-top: -1px;
            font-family: "Tajawal", Helvetica;
            font-weight: 700;
            color: #000000;
            font-size: 18px;
            letter-spacing: 0.25px;
            line-height: 20px;
            white-space: nowrap;
        }

        .product-card .title-2 {
            font-weight: 400;
            color: #000000;
            font-size: 12px;
            position: relative;
            width: fit-content;
            margin-top: -1px;
            font-family: "Tajawal", Helvetica;
            letter-spacing: 0.25px;
            line-height: 20px;
            white-space: nowrap;
        }

        .product-card .frame-2 {
            display: inline-flex;
            align-items: center;
            gap: 2px;
            position: relative;
            flex: 0 0 auto;
        }

        .product-card .title-3 {
            font-weight: 700;
            color: #0000004f;
            font-size: 14px;
            position: relative;
            width: fit-content;
            margin-top: -1px;
            font-family: "Tajawal", Helvetica;
            letter-spacing: 0.25px;
            line-height: 20px;
            white-space: nowrap;
        }

        .product-card .title-4 {
            font-weight: 400;
            color: #0000004f;
            font-size: 8px;
            position: relative;
            width: fit-content;
            margin-top: -1px;
            font-family: "Tajawal", Helvetica;
            letter-spacing: 0.25px;
            line-height: 20px;
            white-space: nowrap;
        }

        .product-card .text-wrapper-2 {
            position: relative;
            width: fit-content;
            font-family: "Tajawal", Helvetica;
            font-weight: 400;
            color: #f87171;
            font-size: 12px;
            letter-spacing: 0.25px;
            line-height: 16px;
            white-space: nowrap;
        }

        .product-card .frame-3 {
            display: inline-flex;
            flex-direction: column;
            height: 120px;
            align-items: flex-end;
            justify-content: space-between;
            position: relative;
            flex: 0 0 auto;
            margin-left: -37px;
        }

        .product-card .rate {
            display: inline-flex;
            align-items: flex-end;
            position: relative;
            flex: 0 0 auto;
        }

        .product-card .star {
            position: relative;
            width: 24px;
            height: 24px;
        }

        .product-card .frame-4 {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            position: relative;
            flex: 0 0 auto;
        }

        .product-card .text-wrapper-3 {
            position: relative;
            width: fit-content;
            font-family: "Roboto", Helvetica;
            font-weight: 500;
            color: #1c1b1f;
            font-size: 16px;
            text-align: center;
            letter-spacing: 0;
            line-height: 18px;
            white-space: nowrap;
        }

        .product-card .div-wrapper {
            display: inline-flex;
            align-items: flex-start;
            gap: 8px;
            padding: 6px 0px 0px;
            position: relative;
            flex: 0 0 auto;
        }

        .product-card .text-wrapper-4 {
            position: relative;
            width: fit-content;
            margin-top: -1px;
            font-family: "Tajawal", Helvetica;
            font-weight: 500;
            color: #60a5fa;
            font-size: 10px;
            letter-spacing: 0;
            line-height: 18px;
            white-space: nowrap;
        }

        .product-card .tags {
            display: inline-flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 8px;
            position: relative;
            flex: 0 0 auto;
        }

        .product-card .tags-2 {
            background-color: #fef08a;
            border: 1px solid;
            display: inline-flex;
            height: 32px;
            align-items: center;
            justify-content: center;
            gap: 4px;
            padding: 6px 8px;
            position: relative;
            border-radius: 0px 12px 0px 12px;
        }

        .product-card .icon {
            position: relative;
            width: 18px;
            height: 18px;
        }

        .product-card .label-text {
            position: relative;
            width: fit-content;
            font-family: "Roboto", Helvetica;
            font-weight: 500;
            color: var(--m3syslighton-surface);
            font-size: 14px;
            text-align: center;
            letter-spacing: 0;
            line-height: 18px;
            white-space: nowrap;
        }

        .product-card .tags-3 {
            border: 1px dashed;
            border-color: #6ad09d;
            display: inline-flex;
            height: 32px;
            align-items: center;
            justify-content: center;
            gap: 4px;
            padding: 6px 8px;
            position: relative;
            border-radius: 0px 12px 0px 12px;
        }

        .product-card .p {
            position: relative;
            width: fit-content;
            font-family: "Roboto", Helvetica;
            font-weight: 400;
            color: var(--m3syslighton-surface);
            font-size: 14px;
            text-align: center;
            letter-spacing: 0;
            line-height: 18px;
            white-space: nowrap;
        }

        .product-card .span {
            font-family: "Roboto", Helvetica;
            font-weight: 400;
            color: #1d1b20;
            font-size: 14px;
            letter-spacing: 0;
            line-height: 18px;
        }

        .product-card .text-wrapper-5 {
            font-weight: 700;
        }

        .product-card .frame-5 {
            display: inline-flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 22px;
            position: absolute;
            top: 23px;
            left: 291px;
            backdrop-filter: blur(4px) brightness(100%);
            -webkit-backdrop-filter: blur(4px) brightness(100%);
        }

        .product-card .favorite-wrapper {
            position: relative;
            width: 32px;
            height: 32px;
            background-color: #ffffff;
            border-radius: 32px;
        }

        .product-card .favorite {
            position: absolute;
            width: 24px;
            height: 24px;
            top: 5px;
            left: 4px;
        }
    </style>
@endif
