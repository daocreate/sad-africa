@extends('frontend.layouts.frontEndBase1')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="container mb-5 ">
        <div class="row">
            <div class="col-lg-3 col-3">
                <a href="/fr/dashboard#list-course-followed" class="js-smoothScroll text-decoration-none">
                    <div class="card info-box-text">
                        <span class="infoPanel__result">29</span>
                        <i class="pull-right fa fa-2x fa-desktop"></i>
                        <div class="infoPanel__description">cours suivis</div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-3">
                <a href="/dashboard/certificates#list-certificate-course" class="js-smoothScroll text-decoration-none">
                    <div class="card infoPanel infoPanel--purple">
                        <span class="infoPanel__result">4</span>
                        <i class=""></i>
                        <div class="infoPanel__description">certificats de réussite de cours</div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-3">
                <a href="/fr/dashboard/certificates#list-certificate-course" class="js-smoothScroll text-decoration-none">
                    <div class="card infoPanel infoPanel--purple">
                        <span class="infoPanel__result">4</span>
                        <i class="infoPanel__icon icon-badge"></i>
                        <div class="infoPanel__description">certificats de réussite de cours</div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-3">
                <div class="card infoPanel infoPanel--purple">
                    <span class="infoPanel__result">98 %</span>
                    <i class="infoPanel__icon icon-score"></i>
                    <div class="infoPanel__description">score moyen</div>
                </div>
            </div>
        </div>
    </div>
    <div class="container col-lg-6 col-md-6">
        <table class="table table-striped table-bordered table-hover rounded" id="myTab">
            <thead>
            <tr>
                <th>{{__('N°')}}</th>
                <th>{{__('date')}} {{__('inscription')}}</th>
                <th >{{__('dao_custom.formation')}}</th>
                <th >{{__('progress')}}</th>
            </tr>
            </thead>
            <tbody>
                @foreach($inscriptions as $key => $inscription)
                    <tr >
                        <td>{{$key+1}}</td>
                        <td>{{ $inscription->date_inscription}}</td>
                        <td>{{ $inscription->formation->label }}</td>
                        <td> 0 / {{ $inscription->formation->length }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection