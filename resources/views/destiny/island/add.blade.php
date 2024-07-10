@extends('admin.admin_master') 
@section('admin')

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <form action="" method="post">
                <div class="row">
                    <div class="col-lg-12">
                        <div id="addproduct-accordion" class="custom-accordion">
                            <div class="card">
                                <a href="#addproduct-productinfo-collapse" class="text-body" data-bs-toggle="collapse" aria-expanded="true" aria-controls="addproduct-productinfo-collapse">
                                    <div class="p-4">
    
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar">
                                                    <div class="avatar-title rounded-circle bg-dark-subtle  text-dark">
                                                        <h5 class="text-dark font-size-17 mb-0">01</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="font-size-16 mb-1">Island Info</h5>
                                                <p class="text-muted text-truncate mb-0">Fill all information below</p>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                            </div>
    
                                        </div>
    
                                    </div>
                                </a>
    
                                <div id="addproduct-productinfo-collapse" class="collapse show" data-bs-parent="#addproduct-accordion">
                                    <div class="p-4 border-top">
                                            
                                    <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="choices-single-default" class="form-label">Nama ENG</label>
                                                        <input class="form-control" data-trigger name="choices-single-category" id="choices-single-category">
                                                        </input>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="choices-single-specifications" class="form-label">Nama IDN</label>
                                                        <input class="form-control" data-trigger name="choices-single-category" id="choices-single-specifications">
                                                        </input>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="choices-single-default" class="form-label">Category</label>
                                                        <select class="form-control" data-trigger name="choices-single-category" id="choices-single-category">
                                                            <option value="">Select</option>
                                                            <option value="EL">Electronic</option>
                                                            <option value="FA">Fashion</option>
                                                            <option value="FI">Fitness</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="choices-single-specifications" class="form-label">Specifications</label>
                                                        <select class="form-control" data-trigger name="choices-single-category" id="choices-single-specifications">
                                                            <option value="HI" selected>High Quality</option>
                                                            <option value="LE" selected>Leather</option>
                                                            <option value="NO">Notifications</option>
                                                            <option value="SI">Sizes</option>
                                                            <option value="DI">Different Color</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
    
                                            <div class="mb-0">
                                                <label class="form-label" for="productdesc">Product Description</label>
                                                <textarea class="form-control" id="productdesc" placeholder="Enter Description" rows="4"></textarea>
                                            </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="card">
                                <a href="#addproduct-img-collapse" class="text-body collbodyd" data-bs-toggle="collapse" aria-haspopup="true" aria-expanded="false" aria-haspopup="true" aria-controls="addproduct-img-collapse">
                                    <div class="p-4">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar">
                                                    <div class="avatar-title rounded-circle bg-dark-subtle  text-dark">
                                                        <h5 class="text-dark font-size-17 mb-0">02</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="font-size-16 mb-1">Island Image</h5>
                                                <p class="text-muted text-truncate mb-0">Fill all information below</p>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>
    
                                <div id="addproduct-img-collapse" class="collapse" data-bs-parent="#addproduct-accordion">
                                    <div class="p-4 border-top">
                                        <div class="row">
                                            <div class="col-lg-4">

                                                <div class="mb-3">
                                                    <label class="form-label" for="image1">Image 1</label>
                                                    <input id="image1" name="image1" type="file" accept="image/*" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">

                                                <div class="mb-3">
                                                    <label class="form-label" for="image2">Image 2</label>
                                                    <input id="image2" name="image2" type="file" accept="image/*" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="image3">Image 3</label>
                                                    <input id="image3" name="image3" type="file" accept="image/*" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">

                                                <div class="mb-3">
                                                    <label class="form-label" for="image4">Image 4</label>
                                                    <input id="image4" name="image4" type="file" accept="image/*" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">

                                                <div class="mb-3">
                                                    <label class="form-label" for="image5">Image 5</label>
                                                    <input id="image5" name="image5" type="file" accept="image/*" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="image6">Image 6</label>
                                                    <input id="image6" name="image6" type="file" accept="image/*" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="card">
                                <a href="#addproduct-metadata-collapse" class="text-body collbodyd" data-bs-toggle="collapse" aria-haspopup="true" aria-expanded="false" aria-haspopup="true" aria-controls="addproduct-metadata-collapse">
                                    <div class="p-4">
    
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar">
                                                    <div class="avatar-title rounded-circle bg-dark-subtle  text-dark">
                                                        <h5 class="text-dark font-size-17 mb-0">03</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="font-size-16 mb-1">Meta Data</h5>
                                                <p class="text-muted text-truncate mb-0">Fill all information below</p>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                            </div>
    
                                        </div>
    
                                    </div>
                                </a>
    
                                <div id="addproduct-metadata-collapse" class="collapse" data-bs-parent="#addproduct-accordion">
                                    <div class="p-4 border-top">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="metatitle">Meta Title</label>
                                                        <input id="metatitle" name="metatitle" placeholder="Enter Title" type="text" class="form-control">
                                                    </div>
    
                                                </div>
    
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="metakeywords">Meta Keywords</label>
                                                        <input id="metakeywords" name="metakeywords" placeholder="Enter Keywords" type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
    
                                            <div class="mb-0">
                                                <label class="form-label" for="metadescription">Meta Description</label>
                                                <textarea class="form-control" id="metadescription" placeholder="Enter Description" rows="4"></textarea>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Button --}}
                <div class="row mb-4">
                    <div class="col text-end">
                        <a href="#" class="btn btn-outline-dark"> <i class="bx bx-x me-1"></i> Cancel </a>
                        <a href="#" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#success-btn"> <i class=" bx bx-file me-1"></i> Save </a>
                    </div> <!-- end col -->
                </div> <!-- end row-->
            </form>
            <!-- end row -->

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    @include('admin.components.footer')
</div>