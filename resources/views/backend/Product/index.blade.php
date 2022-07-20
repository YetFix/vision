@extends('backend.master')

@section('x')
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <a href='/product' class="btn btn-primary">Add New Product</a>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <div class="d-md-flex">
                    <ol class="breadcrumb ms-auto">
                        <li><a href="#" class="fw-normal">Dasboard > Product</a></li>
                    </ol>

                </div>
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title">All Products</h3>
                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0">#</th>
                                    <th class="border-top-0">Product Name</th>
                                    <th class="border-top-0">Product Category</th>
                                    <th class="border-top-0">Product Images</th>
                                    <th class="border-top-0">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i=1)
                                @foreach ($products as $product )
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->category->name}}</td>
                                    <td>
                                        @foreach (json_decode($product->images) as $image )
                                           
                                            <img src="product_images/{{$image}}" style="width: 60px;height:60px;" alt="">
                                        @endforeach
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="{{route('pro.view',$product->id)}}">View</a>
                                        <a class="btn btn-primary" href="{{route('pro.edit',$product->id)}}">Edit</a>
                                        <a class="btn btn-danger" href="{{route('pro.down',$product->id)}}">Download</a>
                                        <a class="btn btn-danger" href="{{route('pro.del',$product->id)}}">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <footer class="footer text-center"> 2021 © All Rights Reserved <a href="https://www.yetfix.com/">yetfix.com</a>
    </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
@endsection