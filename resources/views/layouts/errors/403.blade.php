@extends('errors::base')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message', __($exception->getMessage() ? : 'Akses Dilarang'))
