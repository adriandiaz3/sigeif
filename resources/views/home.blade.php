@extends('layouts.app')

@section('conteudo')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-5"></div>
                        <img class="col" width="300" height="300" src="https://www.sccpre.cat/mypng/detail/128-1289701_ok-emoji-png-ok-emoji.png">
                        <div class="col-5"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
