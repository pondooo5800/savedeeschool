@extends('layouts.master')

@section('title')
Settings | {{ config('settings.name', 'Laravel') }}
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="pull-left">
                    <h4 class="card-title"><i class="material-icons card-icon">settings</i> OEMS Settings</h4>
                </div>
                <div class="pull-right">
                </div>
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="material-icons">close</i>
                    </button>
                    <strong>พบปัญหา!</strong> เกิดปัญหาบางอย่างกับข้อมูลที่คุณป้อน<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="material-icons">close</i>
                    </button>
                    <p>{{ $message }}</p>
                </div>
                @endif
                <div class="settings_form">
                    <form action="{{ route('settings.update', 0) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <span class="h3_title">General</span>
                        <div class="row m_bot_10">
                            <div class="col-xs-2 col-sm-2 col-md-2">
                                <span class="b_label">Website Title</span>
                            </div>
                            <div class="col-xs-8 col-sm-8 col-md-8">
                                <input value="{{ config('settings.name') }}" type="text" name="website_title"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="row m_bot_10">
                            <div class="col-xs-2 col-sm-2 col-md-2">
                                <span class="b_label">Copyright Text</span>
                            </div>
                            <div class="col-xs-8 col-sm-8 col-md-8">
                                <input value="{{ config('settings.copyright') }}" type="text" name="copyright"
                                    class="form-control">
                            </div>
                        </div>
                        <br />
                        <span class="h3_title">Email</span>
                        <div class="row m_bot_10">
                            <div class="col-xs-2 col-sm-2 col-md-2">
                                <span class="b_label">Sender Email</span>
                            </div>
                            <div class="col-xs-8 col-sm-8 col-md-8">
                                <input value="{{ config('settings.sender-email') }}" type="text" name="sender_email"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="row m_bot_10">
                            <div class="col-xs-2 col-sm-2 col-md-2">
                                <span class="b_label">SMTP Server</span>
                            </div>
                            <div class="col-xs-8 col-sm-8 col-md-8">
                                <input value="{{ config('settings.smtp-server') }}" type="text" name="smtp_server"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="row m_bot_10">
                            <div class="col-xs-2 col-sm-2 col-md-2">
                                <span class="b_label">SMTP Username</span>
                            </div>
                            <div class="col-xs-8 col-sm-8 col-md-8">
                                <input value="{{ config('settings.smtp-username') }}" type="text" name="smtp_username"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="row m_bot_10">
                            <div class="col-xs-2 col-sm-2 col-md-2">
                                <span class="b_label">SMTP Password</span>
                            </div>
                            <div class="col-xs-8 col-sm-8 col-md-8">
                                <input value="{{ config('settings.smtp-password') }}" type="password"
                                    name="smtp_password" class="form-control">
                            </div>
                        </div>
                        <div class="row m_bot_10">
                            <div class="col-xs-2 col-sm-2 col-md-2">
                                <span class="b_label">SMTP Encryption</span>
                            </div>
                            <div class="col-xs-8 col-sm-8 col-md-8">
                                <input value="{{ config('settings.smtp-encryption') }}" type="text" name="smtp_port"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="row m_bot_10">
                            <div class="col-xs-2 col-sm-2 col-md-2">
                                <span class="b_label">SMTP Port</span>
                            </div>
                            <div class="col-xs-8 col-sm-8 col-md-8">
                                <input value="{{ config('settings.smtp-port') }}" type="text" name="smtp_port"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-darken">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
</script>
@endsection