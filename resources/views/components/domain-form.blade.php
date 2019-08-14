<form method="post" action="{{ $action }}">
    @csrf
    @isset($method)
        @method($method)
    @endisset
    <div class="row">
        <!-- Dashboard Box -->
        <div class="col-xl-12">
            <div class="dashboard-box margin-top-0">
                <!-- Headline -->
                <div class="headline">
                    <h3><i class="icon-line-awesome-globe"></i> {{ $domain ? 'Edit' : 'Deploy a new' }} form end point.</h3>
                </div>
                <div class="content with-padding padding-bottom-10">
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="submit-field">
                                <h5>Domain Name</h5>
                                <input type="text" class="with-border" placeholder="https://domain.com"
                                       name="name" value="{{ $domain ? $domain->name : old('name') }}" required>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="submit-field">
                                <h5>From Name <i class="help-icon" data-tippy-placement="right" title="This also serves as the form name."></i></h5>
                                <input type="text" class="with-border" placeholder="e.g. Formend Contact Form"
                                       name="email_from" value="{{ $domain ? $domain->email_from : old('email_from') }}" required>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="submit-field">
                                <h5>Email Subject</h5>
                                <input type="text" class="with-border" placeholder="e.g. You've received a submission!)"
                                       name="email_subject" value="{{ $domain ? $domain->email_subject : old('email_subject') }}"
                                       required>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="submit-field">
                                <h5>Email - Primary<i class="help-icon" data-tippy-placement="right" title="Successful submissions will be sent to this email."></i></h5>
                                <input type="email" class="with-border" placeholder="e.g. formend@haqqman.com"
                                       name="email_primary" value="{{ $domain ? $domain->email_primary : old('email_primary') }}" required>
                            </div>
                        </div>

                        <div class="col-xl-4">
                            <div class="submit-field">
                                <h5>Email - Secondary<i class="help-icon" data-tippy-placement="right" title="Carbon copy of successful submission emails (Cc)"></i></h5>
                                <input type="email" class="with-border" placeholder="e.g. formend2@haqqman.com"
                                       name="email_secondary" value="{{ $domain ? $domain->email_secondary : old('email_secondary') }}">
                            </div>
                        </div>

                        <div class="col-xl-4">
                            <div class="submit-field">
                                <h5>Status</h5>
                                <select class="selectpicker with-border" data-size="7" title="Select Status" name="is_active" required>
                                    <option value="1" {{ $domain ? $domain->is_active ? 'selected' : '' : '' }}>Enabled</option>
                                    <option value="0" {{ $domain ? !$domain->is_active ? 'selected' : '' : '' }}>Disabled</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @if($errors->any())
        <!-- display any form field error -->
            <div class="col-xl-12">
                <div class="dashboard-box margin-top-10">
                    <div class="headline">
                        <h3>You have some Errors in your form field.</h3>
                    </div>
                    <div class="content with-padding padding-bottom-10">
                        <div class="row">
                            <div class="col-xl-12">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="col-xl-12">
            <button type="submit" class="button ripple-effect big margin-top-30">
                <i class="icon-feather-plus"></i> {{ $domain ? 'Update' : 'Deploy' }} Domain
            </button>
        </div>
    </div>
</form>
