@extends('layout.master')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
@endsection

@section('main_content')
<div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-sm-6">
          <h3>Basic Card</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">Bonus Ui</li>
            <li class="breadcrumb-item active">Basic Card</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid starts-->
  <div class="container-fluid basic-card">
    <div class="row">
      <div class="col-sm-12 col-xl-6">
        <div class="card">
          <div class="card-header pb-0">
            <h4>Basic Card</h4><span>Example of sample card.</span>
          </div>
          <div class="card-body">
            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.</p>
          </div>
          <div class="card-footer">
            <h6 class="mb-0">Card Footer</h6>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-xl-6">
        <div class="card">
          <div class="card-header bg-primary border-card">
            <h4 class="text-white">Primary Card</h4>
          </div>
          <div class="card-body bg-primary">
            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
          </div>
          <div class="card-footer bg-primary">
            <h6 class="mb-0">Card Footer</h6>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-xl-4">
        <div class="card">
          <div class="card-header b-l-primary border-bottom-light">
            <h4>Border left</h4>
          </div>
          <div class="card-body">
            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.</p>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-xl-4">
        <div class="card">
          <div class="card-header b-t-success border-bottom-light">
            <h4>Border top</h4>
          </div>
          <div class="card-body">
            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.</p>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-xl-4">
        <div class="card">
          <div class="card-header b-r-secondary border-bottom-light">
            <h4>Border right</h4>
          </div>
          <div class="card-body">
            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.</p>
          </div>
        </div>
      </div>
      <div class="col-xl-4 xl-100 box-col-12">
        <div class="card bg-primary">
          <div class="card-body">
            <div class="d-flex faq-widgets">
              <div class="flex-grow-1">
                <h4>Articles</h4>
                <p class="mb-0">How little experience or technical knowledge you currently have. The web is a very big place, and if you are the typical internet user, you probably visit several websites every day.</p>
              </div><i data-feather="file-text"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 xl-50 col-md-6 box-col-6">
        <div class="card bg-primary">
          <div class="card-body">
            <div class="d-flex faq-widgets">
              <div class="flex-grow-1">
                <h4>Knowledgebase</h4>
                <p class="mb-0">The customer support industry support as a specialty is coming into its own, offering companies a competitive advantage that’s difficult to copy.</p>
              </div><i data-feather="book-open"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 xl-50 col-md-6 box-col-6">
        <div class="card bg-primary">
          <div class="card-body">
            <div class="d-flex faq-widgets">
              <div class="flex-grow-1">
                <h4>Support</h4>
                <p class="mb-0">A Website Designing course enables learners to use essential designing and programming tools required to do the job efficiently. The curriculum is a blend of various themes.</p>
              </div><i data-feather="aperture"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-xl-6">
        <div class="card">
          <div class="card-header bg-secondary">
            <h4 class="text-white">Secondary Color Header</h4>
          </div>
          <div class="card-body">
            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the.</p>
          </div>
          <div class="card-footer">
            <h6 class="mb-0">Card Footer</h6>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-xl-6">
        <div class="card">
          <div class="card-header">
            <h4>Info Color Body</h4>
          </div>
          <div class="card-body bg-info">
            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the.</p>
          </div>
          <div class="card-footer">
            <h6 class="mb-0">Card Footer</h6>
          </div>
        </div>
      </div>
      <div class="col-xl-6 xl-100 col-lg-12 box-col-12">
        <div class="card">
          <div class="card-header border-bottom-light">
            <h4 class="pull-left">Simple Tab</h4>
          </div>
          <div class="card-body">
            <div class="tabbed-card">
              <ul class="pull-right nav nav-pills nav-primary" id="pills-clrtab1" role="tablist">
                <li class="nav-item"><a class="nav-link active" id="pills-clrhome-tab1" data-bs-toggle="pill" href="#pills-clrhome1" role="tab" aria-controls="pills-clrhome1" aria-selected="true">Home</a></li>
                <li class="nav-item"><a class="nav-link" id="pills-clrprofile-tab1" data-bs-toggle="pill" href="#pills-clrprofile1" role="tab" aria-controls="pills-clrprofile1" aria-selected="false">Profile</a></li>
                <li class="nav-item"><a class="nav-link" id="pills-clrcontact-tab1" data-bs-toggle="pill" href="#pills-clrcontact1" role="tab" aria-controls="pills-clrcontact1" aria-selected="false">Contact</a></li>
              </ul>
              <div class="tab-content" id="pills-clrtabContent1">
                <div class="tab-pane fade show active" id="pills-clrhome1" role="tabpanel" aria-labelledby="pills-clrhome-tab1">
                  <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                </div>
                <div class="tab-pane fade" id="pills-clrprofile1" role="tabpanel" aria-labelledby="pills-clrprofile-tab1">
                  <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                </div>
                <div class="tab-pane fade" id="pills-clrcontact1" role="tabpanel" aria-labelledby="pills-clrcontact-tab1">
                  <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-6 xl-100 col-lg-12 box-col-12">
        <div class="card">
          <div class="card-header border-bottom-light">
            <h4 class="pull-left">Tab With Icon</h4>
          </div>
          <div class="card-body">
            <div class="tabbed-card">
              <ul class="pull-right nav nav-pills nav-secondary" id="pills-clrtab" role="tablist">
                <li class="nav-item"><a class="nav-link active" id="pills-clrhome-tab" data-bs-toggle="pill" href="#pills-clrhome" role="tab" aria-controls="pills-clrhome" aria-selected="true"><i class="icofont icofont-ui-home"></i>Home</a></li>
                <li class="nav-item"><a class="nav-link" id="pills-clrprofile-tab" data-bs-toggle="pill" href="#pills-clrprofile" role="tab" aria-controls="pills-clrprofile" aria-selected="false"><i class="icofont icofont-man-in-glasses"></i>Profile</a></li>
                <li class="nav-item"><a class="nav-link" id="pills-clrcontact-tab" data-bs-toggle="pill" href="#pills-clrcontact" role="tab" aria-controls="pills-clrcontact" aria-selected="false"><i class="icofont icofont-contacts"></i>Contact</a></li>
              </ul>
              <div class="tab-content" id="pills-clrtabContent">
                <div class="tab-pane fade show active" id="pills-clrhome" role="tabpanel" aria-labelledby="pills-clrhome-tab">
                  <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                </div>
                <div class="tab-pane fade" id="pills-clrprofile" role="tabpanel" aria-labelledby="pills-clrprofile-tab">
                  <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                </div>
                <div class="tab-pane fade" id="pills-clrcontact" role="tabpanel" aria-labelledby="pills-clrcontact-tab">
                  <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
<script src="{{ asset('assets/js/prism/prism.min.js') }}"></script>
<script src="{{ asset('assets/js/clipboard/clipboard.min.js') }}"></script>
<script src="{{ asset('assets/js/custom-card/custom-card.js') }}"></script>
<script src="{{ asset('assets/js/height-equal.js') }}"></script>   
@endsection




