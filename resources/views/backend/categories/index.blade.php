@extends('backend.layout')

@section('main')
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-5">
                <div class="row col-lg-12 margin-tb">
                    <div class="col-lg-4">
                        <a class="btn btn-success" href="{{ route('categories.create') }}"><i class="fa fa-plus"></i></a>
                    </div>
                    <div class="col-lg-6">
                        <h2>{{__('category')}}</h2>
                    </div>
                </div>
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <table class=" table table-striped table-bordered table-hover" id="myTab">
                <thead>
                <tr>
                    <th width="200px">{{__('name')}}</th>
                    <th>{{__('description')}}</th>
                    <th>{{__('state')}}</th>
                    <th width="300px">{{__('action')}}</th>
                </tr>
                </thead>

                <tbody>
                    @foreach( $categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td>{{ $category->state }}</td>
                            <td>
                                <form action="{{ route('categories.destroy',$category->id) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('categories.show',$category->id) }}">{{ __('show') }}</a>
                                    @can('formation-edit')
                                        <a class="btn btn-primary" href="{{ route('categories.edit',$category->id) }}">{{ __('edit') }}</a>
                                    @endcan

                                    @can('formation-delete')
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-danger" href="{{ route('categories.destroy',$category->id) }}">{{ __('delete') }}</a>
                                    @endcan
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection