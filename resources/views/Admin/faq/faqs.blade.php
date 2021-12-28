@include('Admin.assets.navebar')

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="container">
                <div class="container">

                    <div id="navSection" data-spy="affix" class="nav sidenav">
                        <div class="sidenav-content">
                            <a href="#tableSimple" class="active nav-link">Simple</a>
                            <a href="#tableHover" class="nav-link">Hover</a>
                            <a href="#tableStriped" class="nav-link">Striped</a>
                            <a href="#tableLight" class="nav-link">Light</a>
                            <a href="#tableCaption" class="nav-link">Caption</a>
                            <a href="#tableProgress" class="nav-link">Progress</a>
                            <a href="#tableContextual" class="nav-link">Contextual</a>
                            <a href="#tableDropdown" class="nav-link">Dropdown</a>
                            <a href="#tableFooter" class="nav-link">Footer</a>
                            <a href="#tableCheckbox" class="nav-link">Checkbox</a>
                        </div>
                    </div>

                    <div class="row layout-top-spacing">
                        <div id="tableSimple" class="col-lg-12 col-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Faq Table</h4>
                                            <a href="{{ route('faq.create') }}" class="btn btn-primary">Create Faq</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <div class="table-responsive">
                                        <table class="table table-bordered text-center mb-4">
                                            <thead>
                                                <tr>
                                                    <th>Question</th>
                                                    <th>Answer</th>
                                                    <th>Delet</th>
                                                    <th>Edit</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($faqs as $faq)
                                            <tr>
                                                <td>{{ $faq->question }}</td>
                                                <td>{{ $faq->answer }}</td>
                                                <td class="text-center">
                                                <form action="{{route('faq.delete')}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="faq_id" value="{{$faq->id}}">
                                                        <button class="btn btn-danger">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 icon"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                        </button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <a  class="btn btn-secondary" href="{{ route('faq.edit', [$faq->id]) }}">Edit</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>


                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->
@include('Admin.assets.footer')
