@extends('welcome')

@section('content')
    <div class="container-fluid">
        <table class="table table-bordered border-primary">
            <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Раздел ПОК</th>
                <th scope="col">Вопросы аудиторов</th>
                <th scope="col">Требование (документ, пункт)</th>
                <th scope="col">Комментарии респондента</th>
                <th scope="col">Материалы респондента</th>
                <th scope="col">Комментарии аудитора</th>
                <th scope="col">Материалы аудитора</th>
                <th scope="col">Наблюдения аудитора</th>
                <th scope="col">Материалы по наблюдению</th>
                <th scope="col">Устранение наблюдения</th>
                <th scope="col">Фото устранения</th>
            </tr>
            </thead>
            <tbody>
            @if($auditData)
                @foreach($auditData as $key => $data)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $data['paragraph_qap'] }}</td>
                        <td>{{ $data['questions'] }}</td>
                        <td>{{ $data['requirements'] }}</td>
                        <td><span class="text-comment">{{ $data['respondent_comments'] }}</span><span
                                data-audit-id="{{ $data['audit_id'] }}"
                                data-row-id="{{ $data['id'] }}" data-col-id="respondent_comments" class="modal-open"
                                data-bs-toggle="modal" data-bs-target="#staticBackdrop"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path
                                        d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></span>
                        </td>
                        <td>
                            <div class="document_wrapper">
                                <div>
                                    <label for="m_respondent">
                                        <span data-audit-id="{{ $data['audit_id'] }}" data-row-id="{{ $data['id'] }}"
                                              data-col-id="m_respondent" class="modal-open"
                                              data-bs-toggle="modal" data-bs-target="#loadFilesModal"><svg
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                                height="24"><path
                                                    d="M14.513 6a.75.75 0 0 1 .75.75v2h1.987a.75.75 0 0 1 0 1.5h-1.987v2a.75.75 0 1 1-1.5 0v-2H11.75a.75.75 0 0 1 0-1.5h2.013v-2a.75.75 0 0 1 .75-.75Z"></path><path
                                                    d="M7.024 3.75c0-.966.784-1.75 1.75-1.75H20.25c.966 0 1.75.784 1.75 1.75v11.498a1.75 1.75 0 0 1-1.75 1.75H8.774a1.75 1.75 0 0 1-1.75-1.75Zm1.75-.25a.25.25 0 0 0-.25.25v11.498c0 .139.112.25.25.25H20.25a.25.25 0 0 0 .25-.25V3.75a.25.25 0 0 0-.25-.25Z"></path><path
                                                    d="M1.995 10.749a1.75 1.75 0 0 1 1.75-1.751H5.25a.75.75 0 1 1 0 1.5H3.745a.25.25 0 0 0-.25.25L3.5 20.25c0 .138.111.25.25.25h9.5a.25.25 0 0 0 .25-.25v-1.51a.75.75 0 1 1 1.5 0v1.51A1.75 1.75 0 0 1 13.25 22h-9.5A1.75 1.75 0 0 1 2 20.25l-.005-9.501Z"></path></svg></span>
                                    </label>
                                </div>
                                <div>
                                    @if(is_array($data['m_respondent']) && count($data['m_respondent']) > 0)
                                    <span class="badge rounded-pill text-bg-success">Есть фото</span>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td><span class="text-comment">{{ $data['auditor_comments'] }}</span><span
                                data-audit-id="{{ $data['audit_id'] }}"
                                data-row-id="{{ $data['id'] }}" data-col-id="auditor_comments" class="modal-open"
                                data-bs-toggle="modal" data-bs-target="#staticBackdrop"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path
                                        d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></span>
                        </td>
                        <td>
                            <div class="document_wrapper">
                                <div>
                                    <label for="m_auditor">
                                        <span data-audit-id="{{ $data['audit_id'] }}" data-row-id="{{ $data['id'] }}"
                                              data-col-id="m_auditor" class="modal-open"
                                              data-bs-toggle="modal" data-bs-target="#loadFilesModal">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                                 height="24">
                                                <path
                                                    d="M14.513 6a.75.75 0 0 1 .75.75v2h1.987a.75.75 0 0 1 0 1.5h-1.987v2a.75.75 0 1 1-1.5 0v-2H11.75a.75.75 0 0 1 0-1.5h2.013v-2a.75.75 0 0 1 .75-.75Z"></path>
                                                <path
                                                    d="M7.024 3.75c0-.966.784-1.75 1.75-1.75H20.25c.966 0 1.75.784 1.75 1.75v11.498a1.75 1.75 0 0 1-1.75 1.75H8.774a1.75 1.75 0 0 1-1.75-1.75Zm1.75-.25a.25.25 0 0 0-.25.25v11.498c0 .139.112.25.25.25H20.25a.25.25 0 0 0 .25-.25V3.75a.25.25 0 0 0-.25-.25Z"></path>
                                                <path
                                                    d="M1.995 10.749a1.75 1.75 0 0 1 1.75-1.751H5.25a.75.75 0 1 1 0 1.5H3.745a.25.25 0 0 0-.25.25L3.5 20.25c0 .138.111.25.25.25h9.5a.25.25 0 0 0 .25-.25v-1.51a.75.75 0 1 1 1.5 0v1.51A1.75 1.75 0 0 1 13.25 22h-9.5A1.75 1.75 0 0 1 2 20.25l-.005-9.501Z"></path>
                                            </svg>
                                        </span>
                                    </label>
                                </div>
                                <div>
                                    @if(is_array($data['m_auditor']) && count($data['m_auditor']) > 0)
                                    <span class="badge rounded-pill text-bg-success" data-documents="{{ base64_encode(json_encode($data['m_auditor'])) }}">Есть фото</span>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td><span class="text-comment">non_conformity</span><span
                                data-audit-id="{{ $data['audit_id'] }}"
                                data-row-id="{{ $data['id'] }}"
                                data-col-id="non_conformity"
                                class="modal-open"
                                data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path
                                        d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></span>
                        </td>
                        <td>
                            <div class="document_wrapper">
                                <div>
                                    <label for="m_conformity">
                                        <span data-audit-id="{{ $data['audit_id'] }}" data-row-id="{{ $data['id'] }}"
                                              data-col-id="m_conformity" class="modal-open"
                                              data-bs-toggle="modal" data-bs-target="#loadFilesModal">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                             height="24">
                                            <path
                                                d="M14.513 6a.75.75 0 0 1 .75.75v2h1.987a.75.75 0 0 1 0 1.5h-1.987v2a.75.75 0 1 1-1.5 0v-2H11.75a.75.75 0 0 1 0-1.5h2.013v-2a.75.75 0 0 1 .75-.75Z"></path>
                                            <path
                                                d="M7.024 3.75c0-.966.784-1.75 1.75-1.75H20.25c.966 0 1.75.784 1.75 1.75v11.498a1.75 1.75 0 0 1-1.75 1.75H8.774a1.75 1.75 0 0 1-1.75-1.75Zm1.75-.25a.25.25 0 0 0-.25.25v11.498c0 .139.112.25.25.25H20.25a.25.25 0 0 0 .25-.25V3.75a.25.25 0 0 0-.25-.25Z"></path>
                                            <path
                                                d="M1.995 10.749a1.75 1.75 0 0 1 1.75-1.751H5.25a.75.75 0 1 1 0 1.5H3.745a.25.25 0 0 0-.25.25L3.5 20.25c0 .138.111.25.25.25h9.5a.25.25 0 0 0 .25-.25v-1.51a.75.75 0 1 1 1.5 0v1.51A1.75 1.75 0 0 1 13.25 22h-9.5A1.75 1.75 0 0 1 2 20.25l-.005-9.501Z"></path>
                                        </svg>
                                            </span>
                                    </label>
                                </div>
                                <div>
                                    <span class="badge rounded-pill text-bg-success">Есть фото</span>
                                </div>
                            </div>
                        </td>
                        <td><span class="text-comment">non_conformity_response</span><span
                                data-audit-id="{{ $data['audit_id'] }}"
                                data-row-id="{{ $data['id'] }}"
                                data-col-id="non_conformity_response"
                                class="modal-open"
                                data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path
                                        d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></span>
                        </td>
                        <td>
                            <div class="document_wrapper">
                                <div>
                                    <label for="m_conformity_response">
                                        <span data-audit-id="{{ $data['audit_id'] }}" data-row-id="{{ $data['id'] }}"
                                              data-col-id="m_conformity_response" class="modal-open"
                                              data-bs-toggle="modal" data-bs-target="#loadFilesModal">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                             height="24">
                                            <path
                                                d="M14.513 6a.75.75 0 0 1 .75.75v2h1.987a.75.75 0 0 1 0 1.5h-1.987v2a.75.75 0 1 1-1.5 0v-2H11.75a.75.75 0 0 1 0-1.5h2.013v-2a.75.75 0 0 1 .75-.75Z"></path>
                                            <path
                                                d="M7.024 3.75c0-.966.784-1.75 1.75-1.75H20.25c.966 0 1.75.784 1.75 1.75v11.498a1.75 1.75 0 0 1-1.75 1.75H8.774a1.75 1.75 0 0 1-1.75-1.75Zm1.75-.25a.25.25 0 0 0-.25.25v11.498c0 .139.112.25.25.25H20.25a.25.25 0 0 0 .25-.25V3.75a.25.25 0 0 0-.25-.25Z"></path>
                                            <path
                                                d="M1.995 10.749a1.75 1.75 0 0 1 1.75-1.751H5.25a.75.75 0 1 1 0 1.5H3.745a.25.25 0 0 0-.25.25L3.5 20.25c0 .138.111.25.25.25h9.5a.25.25 0 0 0 .25-.25v-1.51a.75.75 0 1 1 1.5 0v1.51A1.75 1.75 0 0 1 13.25 22h-9.5A1.75 1.75 0 0 1 2 20.25l-.005-9.501Z"></path>
                                        </svg>
                                            </span>
                                    </label>
                                </div>
                                <div>
                                    <span class="badge rounded-pill text-bg-success">Есть фото</span>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
    <div class="bottom-panel">
        <nav class="navbar navbar-expand-lg bg-body-tertiary navbar-bottom">
            <div class="container">
                <a class="btn btn-outline-secondary btn-sm" aria-current="page"
                   href="{{ route('audits.year.contractor', ['year' => $year, 'contractor' => $contractor]) }}">Вернуться
                    назад</a>
            </div>
        </nav>
    </div>
    <!-- Модальное окно -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="form-comment"
                      action="{{ route('audits.data.save', ['year' => $year, 'contractor' => $contractor, 'audit' => $auditData[0]['audit_id']]) }}"
                      method="POST">
                    @method('post')
                    @csrf
                    <div class="modal-header">
                        <input type="hidden" name="row-id">
                        <input type="hidden" name="col-id">
{{--                        <input type="hidden" name="audit-id">--}}
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Введите комментарий</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                    </div>
                    <div class="modal-body">
                        <textarea class="form-control" name="commentForm" id="commentForm" rows="3"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                        <button id="submit-form-comment" type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="loadFilesModal" tabindex="-1" aria-labelledby="loadFilesModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="loadFilesModalLabel">Загрузить файлы</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>
                <form id="form-files"
                      action="{{ route('document.save', ['audit' => $auditData[0]['audit_id']]) }}" method="POST" enctype="multipart/form-data">
                    @method('post')
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="row-id">
                        <input type="hidden" name="col-id">
                        <div class="mb-3">
                            <label for="file" class="col-form-label">Файл:</label>
                            <input type="file" class="form-control" name="files[]" id="file" multiple>
                        </div>
{{--                        <div class="mb-3">--}}
{{--                            <label for="message-text" class="col-form-label">Описание:</label>--}}
{{--                            <textarea class="form-control" id="message-text"></textarea>--}}
{{--                        </div>--}}

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                        <button type="button" id="submit-file" class="btn btn-primary">Отправить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="galleryModal" tabindex="-1" aria-labelledby="galleryModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="galleryModalLabel">Документы</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>
                    <div class="modal-body">

                    </div>
            </div>
        </div>
    </div>
@endsection
