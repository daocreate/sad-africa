@extends('frontend.layouts.frontEndBase1')
@section('content')
    <div class="container mb-5">
        <div class="content">
            @php $locale = session()->get('locale'); @endphp
            @if($locale == 'fr')
            <h2>{{__('all')}} (es) {{__('courses')}}</h2>
                @else
                <h2>{{__('all')}} {{__('courses')}}</h2>
            @endif

        </div>
        <div class="row courses_inner">
            <div class="col-md-12 mb-5 ">
                <div class="row">
                    <form action="{{ route('course_list') }}" method="get" class="form-inline col-md-6">
                        <div class="form-group ">
                            <select class="form-control " name="s" >
                                <option value="">{{ __('all')}} {{ __('category')}}</option>
                                @foreach($categories as $category)
                                    @if($category->state == 1)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>@endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="main_btn" value="{{__('filter')}}" />
                        </div>
                    </form>
                    <form action="{{ route('course_list') }}" method="get" class="form-inline col-md-6">
                        <div class="form-group ">
                            <input type="text" class="form-control " placeholder="enter search value" name="s" value="" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="main_btn" value="{{__('courses')}} {{__('filter')}}">
                        </div>
                    </form>
                </div>

            </div>

            <table class="table" id="myTab">
                <tbody>
                    @foreach ($formations as $formation)
                        <tr>
                           <div class="card border-success -2X mb-3 col-md-12 rounded shadow p-3 btn-light"  >
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="{{$formation->getFirstMediaUrl('formation') }}" class="card-img" alt="{{ $formation->label }}" style="width: 13rem; height: 13rem;"  />
                                </div>
                                <div class="col-md-8 mb-3">
                                    <div class="card-body">
                                        <div class="content-cell">
                                            <h3  style="color: #5BC01E"> {{ $formation->category->name}}  </h3>
                                            <smal><h3 class="card-title"> {{ $formation->label }} -   <i class="fa fa-clock-o "></i> {{ $formation->length}}</h3></smal>
                                        </div>
                                        <p class="card-text">{{ $formation->description }}</p>
                                    </div>

                                    <div class="col-lg-8 col-md-8 footer-social">
                                        <a href="#" class="ml-3 mb-3"><i class="lnr lnr-bubble"></i> 35</a>
                                        <a href="#" class="ml-3" style="color: #5BC01E"><i class="lnr lnr-user"></i> {{__('former')}} : {{ $formation->former->name }}</a>
                                    </div>
                                    <p class="card-text float-right"><small class="text-muted ">{{ $formation->updated_at }}</small></p>
                                    <form action="{{ route('inscription', $formation->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="number" id="formation_id" name="formation_id" value="{{ $formation->id}}" hidden="true">
                                        <button type="submit" class="main_btn" > {{ __('inscription') }} </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $formations->appends(['s' => $s])->links() }}
        </div>
    </div>
@endsection