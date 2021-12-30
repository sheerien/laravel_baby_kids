@include('Admin.assets.navebar')



        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="container">

                <div class="container">

                    <div id="navSection" data-spy="affix" class="nav  sidenav">
                        <div class="sidenav-content">
                            <a href="#basic" class="active nav-link">Basic</a>
                            <a href="#sizes" class="nav-link">Sizes</a>
                            <a href="#multiple" class="nav-link">Multiple</a>
                            <a href="#Input_group_action" class="nav-link">Input group with action</a>
                        </div>
                    </div>

                    <div class="row layout-top-spacing">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <h4>{{ $error }}</h4>
                            @endforeach
                        @endif
                        <div id="basic" class="col-lg-12 col-sm-12 col-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Activity Update</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">


                                <form action="{{ route('admin.activity.update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="activity_id" value="{{ $activity->id }}">
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default">Title</span>
                                        </div>
                                        <input type="text" class="form-control" value="{{ $activity->title }}" name="title" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                    </div>

                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default">Slug</span>
                                        </div>
                                        <input type="text" class="form-control" value="{{ $activity->slug }}" name="slug" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                    </div>

                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text">Icon</span>
                                        </div>
                                        <input type="file" class="form-control"  name="icon">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>

                            </div>
                        </div



@include('Admin.assets.footer')
