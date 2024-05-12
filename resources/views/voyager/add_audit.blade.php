@extends('voyager::master')


@section('content')

        <div id="voyager-notifications"></div>
        <div class="page-content browse container-fluid">
            <div class="alerts">
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-bordered">
                        <div class="panel-body">
                            <div class="form-group  col-md-12 ">
                                @if($message)
                                    <p>{{ $message }}</p>
                                @endif
                                <form role="form" class="form-edit-add" action="{{ route('load-audit') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    @if($audits)
                                    <select class="form-control" name="audit_id">
                                        <option value="" selected>Выберите аудит</option>
                                        @foreach($audits as $audit)
                                        <option value="{{ $audit['id'] }}">{{ $audit['audit_number'] }}</option>
                                        @endforeach
                                    </select>
                                    @endif

                                    <label class="control-label" for="audit_load">Выберите файл для загрузки данных аудита</label>
                                    <input required="" type="file" id="audit_load" class="form-control" name="audit_load" placeholder="Выберите файл">
                                    <div class="panel-footer">
                                        <button type="submit" id="audit_load_send" class="btn btn-primary save">Сохранить</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection
