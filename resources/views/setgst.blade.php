<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Billing - Set Gst</title>
    <link rel="icon" href="dist/images/favicon.ico" />

    <!--Plugin CSS-->
    <link href="dist/css/plugins.min.css" rel="stylesheet">

    <!--main Css-->
    <link href="dist/css/main.min.css" rel="stylesheet">
</head>
<body>
    @include('header', ['title' => "Setting GST"])

    <!-- main-content-->
    <div class="wrapper">
        @include('sidebar')
        <div id="content">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <div class="card redial-border-light redial-shadow mb-4 custom-tabs">
                        <div class="card-body">
                            <ul class="nav nav-tabs flex-column flex-sm-row" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link redial-light active" data-toggle="tab" href="#tab1" role="tab" aria-selected="true">GST</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link redial-light " data-toggle="tab" href="#tab2" role="tab" aria-selected="false">CGST</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link redial-light" data-toggle="tab" href="#tab3" role="tab" aria-selected="false">SGST</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link redial-light" data-toggle="tab" href="#tab4" role="tab" aria-selected="false">IGST</a>
                                </li>
                            </ul>
                            <div class="tab-content py-2" id="myTabContent">
                                <div class="tab-pane fade  show active" id="tab1" role="tabpanel">
                                    <div class="col-12 col-lg-6 col-xl-4 mb-4 mb-xl-0">
                                        <div class="card redial-border-light redial-shadow text-center">
                                            <div class="redial-relative p-4">
                                                <div class="background-image-maker py-5 rounded-top rounded-bottom"></div>
                                                <div class="holder-image">
                                                    <img src="dist/images/gst.png" alt="" class="img-fluid d-none">
                                                </div>
                                                <div class="redial-overlay redial-overlay-bg rounded-top rounded-bottom"></div>
                                                <div class="redial-relative text-white">
                                                    <div class="d-table w-100 h-100">
                                                        <div class="d-table-cell align-middle">
                                                            <div class="media d-sm-flex d-block text-center text-sm-left my-4">
                                                                <div class="d-sm-flex mr-sm-3 mr-0">
                                                                    <h1 class="display-4 redial-font-weight-700 text-white d-block mb-0"><i class="fa fa-rupee"></i></h1>
                                                                </div>
                                                                <div class="media-body align-self-center">
                                                                    <h5 class="text-white mb-0">Your GST</h5>
                                                                    <p class="redial-font-weight-700 mb-0">

                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="clearfix mt-3 mb-4">
                                                                <div class="float-none float-sm-right">
                                                                    <h1 class="display-3 redial-font-weight-700 mb-0 text-white">{{$getGst->total_gst_percentage}}<i class="fa fa-percent"></i></h1>
                                                                </div>
                                                            </div>
                                                            <!-- <small>Partly cloudy with a high of 61 F (16.1 <sup>o</sup> c). Winds variable at 2 to 7 mph (3.2 to 11.3 kph)</small> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade " id="tab2" role="tabpanel">
                                    <div class="col-6 col-sm-6" style="height: 281px;">
                                        <div class="row">
                                            <div class="col-12 col-sm-12">
                                                <form  data-toggle="validator" method="POST" action="/setGst" >
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <div class="col-12 col-sm-10">
                                                        <div class="row">
                                                            <div class="col-12 col-sm-8">
                                                                <div class="form-group">
                                                                    <select class="fancy-select1 form-control" name="cgst">
                                                                        <option data-icon="fa fa-percent pt-1 pr-1" value="0">0</option>
                                                                        <option data-icon="fa fa-percent pt-1 pr-1" value="5" <?php if($getGst->cgst_percentage=="5") echo 'selected="selected"'; ?>>5</option>
                                                                        <option data-icon="fa fa-percent pt-1 pr-1" value="9" <?php if($getGst->cgst_percentage=="9") echo 'selected="selected"'; ?>>9</option>
                                                                        <option data-icon="fa fa-percent pt-1 pr-1" value="12" <?php if($getGst->cgst_percentage=="12") echo 'selected="selected"'; ?>>12</option>
                                                                        <option data-icon="fa fa-percent pt-1 pr-1" value="18" <?php if($getGst->cgst_percentage=="18") echo 'selected="selected"'; ?>>18</option>
                                                                        <option data-icon="fa fa-percent pt-1 pr-1" value="24" <?php if($getGst->cgst_percentage=="24") echo 'selected="selected"'; ?>>24</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-primary btn-sm mt-2" style="margin-left: 71px;">Set CGST</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab3" role="tabpanel">
                                    <div class="col-6 col-sm-6" style="height: 281px;">
                                        <div class="row">
                                            <div class="col-12 col-sm-12">
                                                <form  data-toggle="validator" method="POST" action="/setGst" >
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <div class="col-12 col-sm-10">
                                                        <div class="row">
                                                            <div class="col-12 col-sm-8">
                                                                <div class="form-group">
                                                                    <select class="fancy-select1 form-control" name="sgst">
                                                                       <option data-icon="fa fa-percent pt-1 pr-1" value="0">0</option>
                                                                       <option data-icon="fa fa-percent pt-1 pr-1" value="5" <?php if($getGst->sgst_percentage=="5") echo 'selected="selected"'; ?>>5</option>
                                                                       <option data-icon="fa fa-percent pt-1 pr-1" value="9" <?php if($getGst->sgst_percentage=="9") echo 'selected="selected"'; ?>>9</option>
                                                                       <option data-icon="fa fa-percent pt-1 pr-1" value="12" <?php if($getGst->sgst_percentage=="12") echo 'selected="selected"'; ?>>12</option>
                                                                       <option data-icon="fa fa-percent pt-1 pr-1" value="18" <?php if($getGst->sgst_percentage=="18") echo 'selected="selected"'; ?>>18</option>
                                                                       <option data-icon="fa fa-percent pt-1 pr-1" value="24" <?php if($getGst->sgst_percentage=="24") echo 'selected="selected"'; ?>>24</option>
                                                                   </select>
                                                                   </div>
                                                               </div>
                                                           </div>
                                                       </div>
                                                       <button class="btn btn-primary btn-sm mt-2" style="margin-left: 71px;">Set SGST</button>
                                                   </form>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="tab-pane fade" id="tab4" role="tabpanel">
                                    <div class="col-6 col-sm-6" style="height: 281px;">
                                        <div class="row">
                                            <div class="col-12 col-sm-12">
                                                <form  data-toggle="validator" method="POST" action="/setGst" >
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <div class="col-12 col-sm-10">
                                                        <div class="row">
                                                            <div class="col-12 col-sm-8">
                                                                <div class="form-group">
                                                                    <select class="fancy-select1 form-control" name="igst">
                                                                     <option data-icon="fa fa-percent pt-1 pr-1" value="0">0</option>
                                                                     <option data-icon="fa fa-percent pt-1 pr-1" value="5" <?php if($getGst->igst_percentage=="5") echo 'selected="selected"'; ?>>5</option>
                                                                     <option data-icon="fa fa-percent pt-1 pr-1" value="9" <?php if($getGst->igst_percentage=="9") echo 'selected="selected"'; ?>>9</option>
                                                                     <option data-icon="fa fa-percent pt-1 pr-1" value="12" <?php if($getGst->igst_percentage=="12") echo 'selected="selected"'; ?>>12</option>
                                                                     <option data-icon="fa fa-percent pt-1 pr-1" value="18" <?php if($getGst->igst_percentage=="18") echo 'selected="selected"'; ?>>18</option>
                                                                     <option data-icon="fa fa-percent pt-1 pr-1" value="24" <?php if($getGst->igst_percentage=="24") echo 'selected="selected"'; ?>>24</option>
                                                                 </select>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <button class="btn btn-primary btn-sm mt-2" style="margin-left: 71px;">Set IGST</button>
                                             </form>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>    
     </div>
 </div>
 <!-- End main-content-->

 <!-- Top To Bottom-->
 <a href="#" class="scrollup text-center redial-bg-primary redial-rounded-circle-50"> 
    <h4 class="text-white mb-0"><i class="icofont icofont-long-arrow-up"></i></h4>
</a>
<!-- End Top To Bottom-->

<!-- jQuery -->
<script src="dist/js/plugins.min.js"></script>
<script src="dist/js/common.js"></script>
</body>
</html>