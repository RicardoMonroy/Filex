@extends('layouts.app', ['activePage' => 'contracts', 'titlePage' => __('Confirmar')])

@section('content')
<!-- Dashboard Header -->
<div class="block-header">
    <div class="row remove-margin">
        <!-- Title -->
        <div class="col-md-4">
            <!-- If you do not want a link in the header, instead of .header-title-link you can use a div with the class .header-section -->
            <a href="{{ route('contracts.index') }}" class="header-title-link">
                <h1><i class="fas fa-file-contract animation-expandUp"></i>Contratos<br><small>Bienvenido {{ Auth::user()->name }}</small></h1>
            </a>
        </div>
        <!-- END Title -->

        <!-- Statistics -->
        <div class="col-md-8">
            <!-- Outer Grid -->
            <div class="row">
                <div class="col-sm-6">
                    <!-- Inner Grid 1 -->
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="{{ route('files.index') }}" class="header-link">
                                <h1 class="animation-pullDown">
                                    <strong>{{ $files->count() }}</strong><br><small>Archivos</small>
                                </h1>
                            </a>
                        </div>
                        <div class="col-xs-6">
                            <a href="{{ route('contracts.index') }}" class="header-link">
                                <h1 class="animation-pullDown">
                                    <strong>{{ $contracts->count() }}</strong><br><small>Contratos</small>
                                </h1>
                            </a>
                        </div>
                    </div>
                    <!-- END Inner Grid 1 -->
                </div>
                <div class="col-sm-6">
                    <!-- Inner Grid 2 -->
                    <div class="row">
                        {{-- <div class="col-xs-6">
                            <a href="page_special_timeline.html" class="header-link">
                                <h1 class="animation-pullDown">
                                    <strong>7</strong><br><small>Updates</small>
                                </h1>
                            </a>
                        </div> --}}
                        {{-- <div class="col-xs-6">
                            <a href="page_special_message_center.html" class="header-link">
                                <h1 class="animation-pullDown">
                                    <strong>5</strong><br><small>Messages</small>
                                </h1>
                            </a>
                        </div> --}}
                    </div>
                    <!-- END Inner Grid 2 -->
                </div>
            </div>
            <!-- END Outer Grid  -->
        </div>
        <!-- END Statistics -->
    </div>
</div>
<ul class="breadcrumb breadcrumb-top">
    <li><i class="fas fa-file-contract"></i></li>
    <li><a href="{{ route('contracts.index') }}">Contratos</a></li>
    <li>Nuevo</li>
    <li>Confirmar Datos</li>
</ul>
<!-- END Dashboard Header -->

<!-- Dashboard Content -->
<div class="row gutter30">
    <div class="col-md-12">
        <form action="{{ route('contracts.store') }}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
            @csrf
            <!-- Info Column -->
            <div class="col-md-6">


                <!-- Twitter Block -->
                <div class="block">
                    <!-- Twitter Title -->
                    <div class="block-title">
                        <h2><i class="fa fa-info-circle"></i> Info</h2>
                    </div>
                    <!-- END Twitter Title -->

                    <!-- Twitter Content -->
                    <ul class="list-unstyled">
                        <li>
                            <input type="hidden" name="name" id="name" value="{{ $name}}">
                            <h6><span class="label label-default"><i class="fa fa-check-circle"></i> Título del Contrato</span></h6>
                            <p>{{ $name }}</p>
                        </li>
                        <li>
                            <input type="hidden" name="signerOne" id="signerOne" value="{{ $owner->name}}">
                            <input type="hidden" name="emailOne" id="emailOne" value="{{ $owner->email}}">
                            <input type="hidden" name="IdOne" id="emailOne" value="{{ $owner->id}}">
                            <h6><span class="label label-default"><i class="fa fa-check-circle"></i> Datos del Emisor</span></h6>
                            <p>{{ $owner->name }}</p>
                            <p>{{ $owner->email }}</p>
                        </li>
                        <li>
                            <h6><span class="label label-default"><i class="fa fa-check-circle"></i> Datos del receptor</span></h6>
                            @if ($guest_info)
                                <input type="hidden" name="signerTwo" id="signerTwo" value="{{ $guest_name}}">
                                <input type="hidden" name="emailTwo" id="emailTwo" value="{{ $guest_email}}">
                                <input type="hidden" name="IdTwo" id="IdTwo" value="{{ $guest_id}}">
                                <p>{{ $guest_name }}</p>
                                <p>{{ $guest_email }}</p>
                            @else
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="text" id="signerTwo" name="signerTwo" class="form-control" placeholder="Escribe el nombre completo" autofocus required>
                                    </div>
                                </div>
                                <input type="hidden" name="emailTwo" id="emailTwo" value="{{ $guest_email}}">
                                <input type="hidden" name="idTwo" id="idTwo" value="{{ $guest_id}}">
                                <p>{{ $guest_email }}</p>
                            @endif

                        </li>
                        <li>
                            <h6><span class="label label-default"><i class="fa fa-check-circle"></i> Mensaje Opcional</span></h6>
                            <textarea id="message" name="message" rows="4" class="form-control" placeholder="Opcionalmente, puedes enviar un mensaje.."></textarea>
                        </li>
                        <li>
                            <input type="hidden" name="fileName" id="fileName" value="{{ $file->name }}">
                            <input type="hidden" name="fileId" id="fileName" value="{{ $file->id }}">
                            <h6><span class="label label-default"><i class="fa fa-check-circle"></i> Datos del Contrato</span></h6>
                            <p>{{ $file->name }}</p>
                        </li>
                    </ul>
                    <!-- END Twitter Content -->
                </div>
                <!-- END Twitter Block -->
            </div>
            <!-- END Info Column -->

            <!-- File Column -->
            <div class="col-md-6">
                <!-- Updates Block -->
                <div class="block">
                    <!-- Updates Title -->
                    <div class="block-title">
                        <h2><a href="{{ asset('storage') }}/{{ $file->file }}" target="_blank"><i class="fa fa-file-pdf-o"></i></a> Resumen del contrato</h2>
                    </div>
                    <input type="hidden" name="file_path" id="file_path" value="{{ $file->file}}">
                    <iframe width="100%" height="500" src="{{ asset('storage') }}/{{ $file->file }}" frameborder="0"></iframe>


                </div>
                <!-- END Updates Block -->
            </div>
            <!-- END File Column -->


            <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2">
                    <button type="reset" class="btn btn-sm btn-default"><i class="fa fa-times"></i> Borrar</button>
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-arrow-right"></i> Enviar</button>
                </div>
            </div>
        </form>


    </div>
</div>
<!-- END Dashboard Content -->
{{-- <div id="page-content" class="block">
    <!-- Components Header -->
    <div class="block-header">
        <!-- If you do not want a link in the header, instead of .header-title-link you can use a div with the class .header-section -->
        <a href="" class="header-title-link">
            <h1>
                <i class="fa fa-cogs animation-expandUp"></i>Form Components<br><small>Editors, Dropzones, Datepickers and even more components for extra functionality!</small>
            </h1>
        </a>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><i class="fa fa-pencil-square-o"></i></li>
        <li>Forms</li>
        <li><a href="">Components</a></li>
    </ul>
    <!-- END Components Header -->

    <!-- Dropzone Block -->
    <div class="block full">
        <!-- Dropzone Title -->
        <div class="block-title">
            <h2><i class="fa fa-cloud-upload"></i> Advanced File Upload <small>Drag and Drop files to upload them! <code>.dropzone</code></small></h2>
        </div>
        <!-- END Dropzone Title -->

        <!-- Dropzone Content -->
        <!-- Dropzone.js, You can check out https://github.com/enyo/dropzone/wiki for usage examples -->
        <form action="page_forms_components.html" class="dropzone dz-clickable"><div class="dz-default dz-message"><span>Drop files here to upload</span></div></form>
        <!-- END Dropzone Content -->
    </div>
    <!-- END Dropzone Block -->

    <!-- Various Components Block -->
    <div class="block">
        <!-- Various Components Title -->
        <div class="block-title">
            <h2><i class="fa fa-cogs"></i> Various Components</h2>
        </div>
        <!-- END Various Components Title -->

        <!-- Various Components Content -->
        <form action="page_forms_components.html" method="post" class="form-horizontal" onsubmit="return false;">
            <!-- Chosen plugin, for usage examples you can check out http://harvesthq.github.io/chosen/ -->
            <h4 class="sub-header">Advanced Select Boxes <small><code>.select-chosen</code></small></h4>
            <div class="form-group">
                <label class="col-md-2 control-label" for="example-chosen">Chosen</label>
                <div class="col-md-10">
                    <select id="example-chosen" name="example-chosen" class="select-chosen" data-placeholder="Choose a Country..." style="width: 250px; display: none;">
                        <option value="">Choose a Country...</option>
                        <option value="United States">United States</option>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="Afghanistan">Afghanistan</option>
                        <option value="Aland Islands">Aland Islands</option>
                        <option value="Albania">Albania</option>
                        <option value="Algeria">Algeria</option>
                        <option value="American Samoa">American Samoa</option>
                        <option value="Andorra">Andorra</option>
                        <option value="Angola">Angola</option>
                        <option value="Anguilla">Anguilla</option>
                        <option value="Antarctica">Antarctica</option>
                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                        <option value="Argentina">Argentina</option>
                        <option value="Armenia">Armenia</option>
                        <option value="Aruba">Aruba</option>
                        <option value="Australia">Australia</option>
                        <option value="Austria">Austria</option>
                        <option value="Azerbaijan">Azerbaijan</option>
                        <option value="Bahamas">Bahamas</option>
                        <option value="Bahrain">Bahrain</option>
                        <option value="Bangladesh">Bangladesh</option>
                        <option value="Barbados">Barbados</option>
                        <option value="Belarus">Belarus</option>
                        <option value="Belgium">Belgium</option>
                        <option value="Belize">Belize</option>
                        <option value="Benin">Benin</option>
                        <option value="Bermuda">Bermuda</option>
                        <option value="Bhutan">Bhutan</option>
                        <option value="Bolivia, Plurinational State of">Bolivia, Plurinational State of</option>
                        <option value="Bonaire, Sint Eustatius and Saba">Bonaire, Sint Eustatius and Saba</option>
                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                        <option value="Botswana">Botswana</option>
                        <option value="Bouvet Island">Bouvet Island</option>
                        <option value="Brazil">Brazil</option>
                        <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                        <option value="Bulgaria">Bulgaria</option>
                        <option value="Burkina Faso">Burkina Faso</option>
                        <option value="Burundi">Burundi</option>
                        <option value="Cambodia">Cambodia</option>
                        <option value="Cameroon">Cameroon</option>
                        <option value="Canada">Canada</option>
                        <option value="Cape Verde">Cape Verde</option>
                        <option value="Cayman Islands">Cayman Islands</option>
                        <option value="Central African Republic">Central African Republic</option>
                        <option value="Chad">Chad</option>
                        <option value="Chile">Chile</option>
                        <option value="China">China</option>
                        <option value="Christmas Island">Christmas Island</option>
                        <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                        <option value="Colombia">Colombia</option>
                        <option value="Comoros">Comoros</option>
                        <option value="Congo">Congo</option>
                        <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                        <option value="Cook Islands">Cook Islands</option>
                        <option value="Costa Rica">Costa Rica</option>
                        <option value="Cote D'ivoire">Cote D'ivoire</option>
                        <option value="Croatia">Croatia</option>
                        <option value="Cuba">Cuba</option>
                        <option value="Curacao">Curacao</option>
                        <option value="Cyprus">Cyprus</option>
                        <option value="Czech Republic">Czech Republic</option>
                        <option value="Denmark">Denmark</option>
                        <option value="Djibouti">Djibouti</option>
                        <option value="Dominica">Dominica</option>
                        <option value="Dominican Republic">Dominican Republic</option>
                        <option value="Ecuador">Ecuador</option>
                        <option value="Egypt">Egypt</option>
                        <option value="El Salvador">El Salvador</option>
                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                        <option value="Eritrea">Eritrea</option>
                        <option value="Estonia">Estonia</option>
                        <option value="Ethiopia">Ethiopia</option>
                        <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                        <option value="Faroe Islands">Faroe Islands</option>
                        <option value="Fiji">Fiji</option>
                        <option value="Finland">Finland</option>
                        <option value="France">France</option>
                        <option value="French Guiana">French Guiana</option>
                        <option value="French Polynesia">French Polynesia</option>
                        <option value="French Southern Territories">French Southern Territories</option>
                        <option value="Gabon">Gabon</option>
                        <option value="Gambia">Gambia</option>
                        <option value="Georgia">Georgia</option>
                        <option value="Germany">Germany</option>
                        <option value="Ghana">Ghana</option>
                        <option value="Gibraltar">Gibraltar</option>
                        <option value="Greece">Greece</option>
                        <option value="Greenland">Greenland</option>
                        <option value="Grenada">Grenada</option>
                        <option value="Guadeloupe">Guadeloupe</option>
                        <option value="Guam">Guam</option>
                        <option value="Guatemala">Guatemala</option>
                        <option value="Guernsey">Guernsey</option>
                        <option value="Guinea">Guinea</option>
                        <option value="Guinea-bissau">Guinea-bissau</option>
                        <option value="Guyana">Guyana</option>
                        <option value="Haiti">Haiti</option>
                        <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                        <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                        <option value="Honduras">Honduras</option>
                        <option value="Hong Kong">Hong Kong</option>
                        <option value="Hungary">Hungary</option>
                        <option value="Iceland">Iceland</option>
                        <option value="India">India</option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                        <option value="Iraq">Iraq</option>
                        <option value="Ireland">Ireland</option>
                        <option value="Isle of Man">Isle of Man</option>
                        <option value="Israel">Israel</option>
                        <option value="Italy">Italy</option>
                        <option value="Jamaica">Jamaica</option>
                        <option value="Japan">Japan</option>
                        <option value="Jersey">Jersey</option>
                        <option value="Jordan">Jordan</option>
                        <option value="Kazakhstan">Kazakhstan</option>
                        <option value="Kenya">Kenya</option>
                        <option value="Kiribati">Kiribati</option>
                        <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                        <option value="Korea, Republic of">Korea, Republic of</option>
                        <option value="Kuwait">Kuwait</option>
                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                        <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                        <option value="Latvia">Latvia</option>
                        <option value="Lebanon">Lebanon</option>
                        <option value="Lesotho">Lesotho</option>
                        <option value="Liberia">Liberia</option>
                        <option value="Libya">Libya</option>
                        <option value="Liechtenstein">Liechtenstein</option>
                        <option value="Lithuania">Lithuania</option>
                        <option value="Luxembourg">Luxembourg</option>
                        <option value="Macao">Macao</option>
                        <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                        <option value="Madagascar">Madagascar</option>
                        <option value="Malawi">Malawi</option>
                        <option value="Malaysia">Malaysia</option>
                        <option value="Maldives">Maldives</option>
                        <option value="Mali">Mali</option>
                        <option value="Malta">Malta</option>
                        <option value="Marshall Islands">Marshall Islands</option>
                        <option value="Martinique">Martinique</option>
                        <option value="Mauritania">Mauritania</option>
                        <option value="Mauritius">Mauritius</option>
                        <option value="Mayotte">Mayotte</option>
                        <option value="Mexico">Mexico</option>
                        <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                        <option value="Moldova, Republic of">Moldova, Republic of</option>
                        <option value="Monaco">Monaco</option>
                        <option value="Mongolia">Mongolia</option>
                        <option value="Montenegro">Montenegro</option>
                        <option value="Montserrat">Montserrat</option>
                        <option value="Morocco">Morocco</option>
                        <option value="Mozambique">Mozambique</option>
                        <option value="Myanmar">Myanmar</option>
                        <option value="Namibia">Namibia</option>
                        <option value="Nauru">Nauru</option>
                        <option value="Nepal">Nepal</option>
                        <option value="Netherlands">Netherlands</option>
                        <option value="New Caledonia">New Caledonia</option>
                        <option value="New Zealand">New Zealand</option>
                        <option value="Nicaragua">Nicaragua</option>
                        <option value="Niger">Niger</option>
                        <option value="Nigeria">Nigeria</option>
                        <option value="Niue">Niue</option>
                        <option value="Norfolk Island">Norfolk Island</option>
                        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                        <option value="Norway">Norway</option>
                        <option value="Oman">Oman</option>
                        <option value="Pakistan">Pakistan</option>
                        <option value="Palau">Palau</option>
                        <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                        <option value="Panama">Panama</option>
                        <option value="Papua New Guinea">Papua New Guinea</option>
                        <option value="Paraguay">Paraguay</option>
                        <option value="Peru">Peru</option>
                        <option value="Philippines">Philippines</option>
                        <option value="Pitcairn">Pitcairn</option>
                        <option value="Poland">Poland</option>
                        <option value="Portugal">Portugal</option>
                        <option value="Puerto Rico">Puerto Rico</option>
                        <option value="Qatar">Qatar</option>
                        <option value="Reunion">Reunion</option>
                        <option value="Romania">Romania</option>
                        <option value="Russian Federation">Russian Federation</option>
                        <option value="Rwanda">Rwanda</option>
                        <option value="Saint Barthelemy">Saint Barthelemy</option>
                        <option value="Saint Helena, Ascension and Tristan da Cunha">Saint Helena, Ascension and Tristan da Cunha</option>
                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                        <option value="Saint Lucia">Saint Lucia</option>
                        <option value="Saint Martin (French part)">Saint Martin (French part)</option>
                        <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                        <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                        <option value="Samoa">Samoa</option>
                        <option value="San Marino">San Marino</option>
                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                        <option value="Saudi Arabia">Saudi Arabia</option>
                        <option value="Senegal">Senegal</option>
                        <option value="Serbia">Serbia</option>
                        <option value="Seychelles">Seychelles</option>
                        <option value="Sierra Leone">Sierra Leone</option>
                        <option value="Singapore">Singapore</option>
                        <option value="Sint Maarten (Dutch part)">Sint Maarten (Dutch part)</option>
                        <option value="Slovakia">Slovakia</option>
                        <option value="Slovenia">Slovenia</option>
                        <option value="Solomon Islands">Solomon Islands</option>
                        <option value="Somalia">Somalia</option>
                        <option value="South Africa">South Africa</option>
                        <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                        <option value="South Sudan">South Sudan</option>
                        <option value="Spain">Spain</option>
                        <option value="Sri Lanka">Sri Lanka</option>
                        <option value="Sudan">Sudan</option>
                        <option value="Suriname">Suriname</option>
                        <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                        <option value="Swaziland">Swaziland</option>
                        <option value="Sweden">Sweden</option>
                        <option value="Switzerland">Switzerland</option>
                        <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                        <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                        <option value="Tajikistan">Tajikistan</option>
                        <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                        <option value="Thailand">Thailand</option>
                        <option value="Timor-leste">Timor-leste</option>
                        <option value="Togo">Togo</option>
                        <option value="Tokelau">Tokelau</option>
                        <option value="Tonga">Tonga</option>
                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                        <option value="Tunisia">Tunisia</option>
                        <option value="Turkey">Turkey</option>
                        <option value="Turkmenistan">Turkmenistan</option>
                        <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                        <option value="Tuvalu">Tuvalu</option>
                        <option value="Uganda">Uganda</option>
                        <option value="Ukraine">Ukraine</option>
                        <option value="United Arab Emirates">United Arab Emirates</option>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="United States">United States</option>
                        <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                        <option value="Uruguay">Uruguay</option>
                        <option value="Uzbekistan">Uzbekistan</option>
                        <option value="Vanuatu">Vanuatu</option>
                        <option value="Venezuela, Bolivarian Republic of">Venezuela, Bolivarian Republic of</option>
                        <option value="Viet Nam">Viet Nam</option>
                        <option value="Virgin Islands, British">Virgin Islands, British</option>
                        <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                        <option value="Wallis and Futuna">Wallis and Futuna</option>
                        <option value="Western Sahara">Western Sahara</option>
                        <option value="Yemen">Yemen</option>
                        <option value="Zambia">Zambia</option>
                        <option value="Zimbabwe">Zimbabwe</option>
                    </select><div class="chosen-container chosen-container-single" style="width: 250px;" title="" id="example_chosen_chosen"><a class="chosen-single chosen-default" tabindex="-1"><span>Choose a Country...</span><div><b></b></div></a><div class="chosen-drop"><div class="chosen-search"><input type="text" autocomplete="off"></div><ul class="chosen-results"></ul></div></div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="example-chosen-multiple">Chosen Multiple</label>
                <div class="col-md-10">
                    <select id="example-chosen-multiple" name="example-chosen-multiple" class="select-chosen" data-placeholder="Choose a Country..." style="width: 250px; display: none;" multiple="">
                        <option value="United States">United States</option>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="Afghanistan">Afghanistan</option>
                        <option value="Aland Islands">Aland Islands</option>
                        <option value="Albania">Albania</option>
                        <option value="Algeria">Algeria</option>
                        <option value="American Samoa">American Samoa</option>
                        <option value="Andorra">Andorra</option>
                        <option value="Angola">Angola</option>
                        <option value="Anguilla">Anguilla</option>
                        <option value="Antarctica">Antarctica</option>
                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                        <option value="Argentina">Argentina</option>
                        <option value="Armenia">Armenia</option>
                        <option value="Aruba">Aruba</option>
                        <option value="Australia">Australia</option>
                        <option value="Austria">Austria</option>
                        <option value="Azerbaijan">Azerbaijan</option>
                        <option value="Bahamas">Bahamas</option>
                        <option value="Bahrain">Bahrain</option>
                        <option value="Bangladesh">Bangladesh</option>
                        <option value="Barbados">Barbados</option>
                        <option value="Belarus">Belarus</option>
                        <option value="Belgium">Belgium</option>
                        <option value="Belize">Belize</option>
                        <option value="Benin">Benin</option>
                        <option value="Bermuda">Bermuda</option>
                        <option value="Bhutan">Bhutan</option>
                        <option value="Bolivia, Plurinational State of">Bolivia, Plurinational State of</option>
                        <option value="Bonaire, Sint Eustatius and Saba">Bonaire, Sint Eustatius and Saba</option>
                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                        <option value="Botswana">Botswana</option>
                        <option value="Bouvet Island">Bouvet Island</option>
                        <option value="Brazil">Brazil</option>
                        <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                        <option value="Bulgaria">Bulgaria</option>
                        <option value="Burkina Faso">Burkina Faso</option>
                        <option value="Burundi">Burundi</option>
                        <option value="Cambodia">Cambodia</option>
                        <option value="Cameroon">Cameroon</option>
                        <option value="Canada">Canada</option>
                        <option value="Cape Verde">Cape Verde</option>
                        <option value="Cayman Islands">Cayman Islands</option>
                        <option value="Central African Republic">Central African Republic</option>
                        <option value="Chad">Chad</option>
                        <option value="Chile">Chile</option>
                        <option value="China">China</option>
                        <option value="Christmas Island">Christmas Island</option>
                        <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                        <option value="Colombia">Colombia</option>
                        <option value="Comoros">Comoros</option>
                        <option value="Congo">Congo</option>
                        <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                        <option value="Cook Islands">Cook Islands</option>
                        <option value="Costa Rica">Costa Rica</option>
                        <option value="Cote D'ivoire">Cote D'ivoire</option>
                        <option value="Croatia">Croatia</option>
                        <option value="Cuba">Cuba</option>
                        <option value="Curacao">Curacao</option>
                        <option value="Cyprus">Cyprus</option>
                        <option value="Czech Republic">Czech Republic</option>
                        <option value="Denmark">Denmark</option>
                        <option value="Djibouti">Djibouti</option>
                        <option value="Dominica">Dominica</option>
                        <option value="Dominican Republic">Dominican Republic</option>
                        <option value="Ecuador">Ecuador</option>
                        <option value="Egypt">Egypt</option>
                        <option value="El Salvador">El Salvador</option>
                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                        <option value="Eritrea">Eritrea</option>
                        <option value="Estonia">Estonia</option>
                        <option value="Ethiopia">Ethiopia</option>
                        <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                        <option value="Faroe Islands">Faroe Islands</option>
                        <option value="Fiji">Fiji</option>
                        <option value="Finland">Finland</option>
                        <option value="France">France</option>
                        <option value="French Guiana">French Guiana</option>
                        <option value="French Polynesia">French Polynesia</option>
                        <option value="French Southern Territories">French Southern Territories</option>
                        <option value="Gabon">Gabon</option>
                        <option value="Gambia">Gambia</option>
                        <option value="Georgia">Georgia</option>
                        <option value="Germany">Germany</option>
                        <option value="Ghana">Ghana</option>
                        <option value="Gibraltar">Gibraltar</option>
                        <option value="Greece">Greece</option>
                        <option value="Greenland">Greenland</option>
                        <option value="Grenada">Grenada</option>
                        <option value="Guadeloupe">Guadeloupe</option>
                        <option value="Guam">Guam</option>
                        <option value="Guatemala">Guatemala</option>
                        <option value="Guernsey">Guernsey</option>
                        <option value="Guinea">Guinea</option>
                        <option value="Guinea-bissau">Guinea-bissau</option>
                        <option value="Guyana">Guyana</option>
                        <option value="Haiti">Haiti</option>
                        <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                        <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                        <option value="Honduras">Honduras</option>
                        <option value="Hong Kong">Hong Kong</option>
                        <option value="Hungary">Hungary</option>
                        <option value="Iceland">Iceland</option>
                        <option value="India">India</option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                        <option value="Iraq">Iraq</option>
                        <option value="Ireland">Ireland</option>
                        <option value="Isle of Man">Isle of Man</option>
                        <option value="Israel">Israel</option>
                        <option value="Italy">Italy</option>
                        <option value="Jamaica">Jamaica</option>
                        <option value="Japan">Japan</option>
                        <option value="Jersey">Jersey</option>
                        <option value="Jordan">Jordan</option>
                        <option value="Kazakhstan">Kazakhstan</option>
                        <option value="Kenya">Kenya</option>
                        <option value="Kiribati">Kiribati</option>
                        <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                        <option value="Korea, Republic of">Korea, Republic of</option>
                        <option value="Kuwait">Kuwait</option>
                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                        <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                        <option value="Latvia">Latvia</option>
                        <option value="Lebanon">Lebanon</option>
                        <option value="Lesotho">Lesotho</option>
                        <option value="Liberia">Liberia</option>
                        <option value="Libya">Libya</option>
                        <option value="Liechtenstein">Liechtenstein</option>
                        <option value="Lithuania">Lithuania</option>
                        <option value="Luxembourg">Luxembourg</option>
                        <option value="Macao">Macao</option>
                        <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                        <option value="Madagascar">Madagascar</option>
                        <option value="Malawi">Malawi</option>
                        <option value="Malaysia">Malaysia</option>
                        <option value="Maldives">Maldives</option>
                        <option value="Mali">Mali</option>
                        <option value="Malta">Malta</option>
                        <option value="Marshall Islands">Marshall Islands</option>
                        <option value="Martinique">Martinique</option>
                        <option value="Mauritania">Mauritania</option>
                        <option value="Mauritius">Mauritius</option>
                        <option value="Mayotte">Mayotte</option>
                        <option value="Mexico">Mexico</option>
                        <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                        <option value="Moldova, Republic of">Moldova, Republic of</option>
                        <option value="Monaco">Monaco</option>
                        <option value="Mongolia">Mongolia</option>
                        <option value="Montenegro">Montenegro</option>
                        <option value="Montserrat">Montserrat</option>
                        <option value="Morocco">Morocco</option>
                        <option value="Mozambique">Mozambique</option>
                        <option value="Myanmar">Myanmar</option>
                        <option value="Namibia">Namibia</option>
                        <option value="Nauru">Nauru</option>
                        <option value="Nepal">Nepal</option>
                        <option value="Netherlands">Netherlands</option>
                        <option value="New Caledonia">New Caledonia</option>
                        <option value="New Zealand">New Zealand</option>
                        <option value="Nicaragua">Nicaragua</option>
                        <option value="Niger">Niger</option>
                        <option value="Nigeria">Nigeria</option>
                        <option value="Niue">Niue</option>
                        <option value="Norfolk Island">Norfolk Island</option>
                        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                        <option value="Norway">Norway</option>
                        <option value="Oman">Oman</option>
                        <option value="Pakistan">Pakistan</option>
                        <option value="Palau">Palau</option>
                        <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                        <option value="Panama">Panama</option>
                        <option value="Papua New Guinea">Papua New Guinea</option>
                        <option value="Paraguay">Paraguay</option>
                        <option value="Peru">Peru</option>
                        <option value="Philippines">Philippines</option>
                        <option value="Pitcairn">Pitcairn</option>
                        <option value="Poland">Poland</option>
                        <option value="Portugal">Portugal</option>
                        <option value="Puerto Rico">Puerto Rico</option>
                        <option value="Qatar">Qatar</option>
                        <option value="Reunion">Reunion</option>
                        <option value="Romania">Romania</option>
                        <option value="Russian Federation">Russian Federation</option>
                        <option value="Rwanda">Rwanda</option>
                        <option value="Saint Barthelemy">Saint Barthelemy</option>
                        <option value="Saint Helena, Ascension and Tristan da Cunha">Saint Helena, Ascension and Tristan da Cunha</option>
                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                        <option value="Saint Lucia">Saint Lucia</option>
                        <option value="Saint Martin (French part)">Saint Martin (French part)</option>
                        <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                        <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                        <option value="Samoa">Samoa</option>
                        <option value="San Marino">San Marino</option>
                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                        <option value="Saudi Arabia">Saudi Arabia</option>
                        <option value="Senegal">Senegal</option>
                        <option value="Serbia">Serbia</option>
                        <option value="Seychelles">Seychelles</option>
                        <option value="Sierra Leone">Sierra Leone</option>
                        <option value="Singapore">Singapore</option>
                        <option value="Sint Maarten (Dutch part)">Sint Maarten (Dutch part)</option>
                        <option value="Slovakia">Slovakia</option>
                        <option value="Slovenia">Slovenia</option>
                        <option value="Solomon Islands">Solomon Islands</option>
                        <option value="Somalia">Somalia</option>
                        <option value="South Africa">South Africa</option>
                        <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                        <option value="South Sudan">South Sudan</option>
                        <option value="Spain">Spain</option>
                        <option value="Sri Lanka">Sri Lanka</option>
                        <option value="Sudan">Sudan</option>
                        <option value="Suriname">Suriname</option>
                        <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                        <option value="Swaziland">Swaziland</option>
                        <option value="Sweden">Sweden</option>
                        <option value="Switzerland">Switzerland</option>
                        <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                        <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                        <option value="Tajikistan">Tajikistan</option>
                        <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                        <option value="Thailand">Thailand</option>
                        <option value="Timor-leste">Timor-leste</option>
                        <option value="Togo">Togo</option>
                        <option value="Tokelau">Tokelau</option>
                        <option value="Tonga">Tonga</option>
                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                        <option value="Tunisia">Tunisia</option>
                        <option value="Turkey">Turkey</option>
                        <option value="Turkmenistan">Turkmenistan</option>
                        <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                        <option value="Tuvalu">Tuvalu</option>
                        <option value="Uganda">Uganda</option>
                        <option value="Ukraine">Ukraine</option>
                        <option value="United Arab Emirates">United Arab Emirates</option>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="United States">United States</option>
                        <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                        <option value="Uruguay">Uruguay</option>
                        <option value="Uzbekistan">Uzbekistan</option>
                        <option value="Vanuatu">Vanuatu</option>
                        <option value="Venezuela, Bolivarian Republic of">Venezuela, Bolivarian Republic of</option>
                        <option value="Viet Nam">Viet Nam</option>
                        <option value="Virgin Islands, British">Virgin Islands, British</option>
                        <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                        <option value="Wallis and Futuna">Wallis and Futuna</option>
                        <option value="Western Sahara">Western Sahara</option>
                        <option value="Yemen">Yemen</option>
                        <option value="Zambia">Zambia</option>
                        <option value="Zimbabwe">Zimbabwe</option>
                    </select><div class="chosen-container chosen-container-multi" style="width: 250px;" title="" id="example_chosen_multiple_chosen"><ul class="chosen-choices"><li class="search-field"><input type="text" value="Choose a Country..." class="default" autocomplete="off" style="width: 143px;"></li></ul><div class="chosen-drop"><ul class="chosen-results"></ul></div></div>
                </div>
            </div>
            <!-- Select2 plugin, for usage examples you can check out https://github.com/ivaynberg/select2 -->
            <div class="form-group">
                <label class="col-md-2 control-label" for="example-select2">Select2</label>
                <div class="col-md-10">
                    <div class="select2-container select-select2" id="s2id_example-select2" style="width: 250px;"><a href="javascript:void(0)" class="select2-choice select2-default" tabindex="-1">   <span class="select2-chosen" id="select2-chosen-1">Choose one..</span><abbr class="select2-search-choice-close"></abbr>   <span class="select2-arrow" role="presentation"><b role="presentation"></b></span></a><label for="s2id_autogen1" class="select2-offscreen">Select2</label><input class="select2-focusser select2-offscreen" type="text" aria-haspopup="true" role="button" aria-labelledby="select2-chosen-1" id="s2id_autogen1"><div class="select2-drop select2-display-none select2-with-searchbox">   <div class="select2-search">       <label for="s2id_autogen1_search" class="select2-offscreen">Select2</label>       <input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input" role="combobox" aria-expanded="true" aria-autocomplete="list" aria-owns="select2-results-1" id="s2id_autogen1_search" placeholder="">   </div>   <ul class="select2-results" role="listbox" id="select2-results-1">   </ul></div></div><select id="example-select2" name="example-select2" class="select-select2" data-placeholder="Choose one.." style="width: 250px; display: none;" tabindex="-1" title="Select2">
                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                        <option value="HTML">HTML</option>
                        <option value="CSS">CSS</option>
                        <option value="Javascript">Javascript</option>
                        <option value="PHP">PHP</option>
                        <option value="MySQL">MySQL</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="example-select2-multiple">Select2 Multiple</label>
                <div class="col-md-10">
                    <div class="select2-container select2-container-multi select-select2" id="s2id_example-select2-multiple" style="width: 250px;"><ul class="select2-choices">  <li class="select2-search-field">    <label for="s2id_autogen2" class="select2-offscreen">Select2 Multiple</label>    <input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input select2-default" id="s2id_autogen2" placeholder="" style="width: 243px;">  </li></ul><div class="select2-drop select2-drop-multi select2-display-none">   <ul class="select2-results">   <li class="select2-no-results">No matches found</li></ul></div></div><select id="example-select2-multiple" name="example-select2-multiple" class="select-select2" data-placeholder="Choose one.." style="width: 250px; display: none;" multiple="" tabindex="-1">
                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                        <option value="HTML">HTML</option>
                        <option value="CSS">CSS</option>
                        <option value="Javascript">Javascript</option>
                        <option value="PHP">PHP</option>
                        <option value="MySQL">MySQL</option>
                    </select>
                </div>
            </div>
            <!-- Timepicker for Bootstrap, for usage examples you can check out http://jdewit.github.io/bootstrap-timepicker/ -->
            <h4 class="sub-header">Timepicker <small><code>.input-timepicker</code> <code>.input-timepicker24</code></small></h4>
            <div class="form-group">
                <label class="col-md-2 control-label" for="example-timepicker">Select Time</label>
                <div class="col-md-2">
                    <div class="input-group bootstrap-timepicker"><div class="bootstrap-timepicker-widget dropdown-menu"><table><tbody><tr><td><a href="#" data-action="incrementHour"><i class="fa fa-chevron-up"></i></a></td><td class="separator">&nbsp;</td><td><a href="#" data-action="incrementMinute"><i class="fa fa-chevron-up"></i></a></td><td class="separator">&nbsp;</td><td><a href="#" data-action="incrementSecond"><i class="fa fa-chevron-up"></i></a></td><td class="separator">&nbsp;</td><td class="meridian-column"><a href="#" data-action="toggleMeridian"><i class="fa fa-chevron-up"></i></a></td></tr><tr><td><input type="text" class="form-control bootstrap-timepicker-hour" maxlength="2"></td> <td class="separator">:</td><td><input type="text" class="form-control bootstrap-timepicker-minute" maxlength="2"></td> <td class="separator">:</td><td><input type="text" class="form-control bootstrap-timepicker-second" maxlength="2"></td><td class="separator">&nbsp;</td><td><input type="text" class="form-control bootstrap-timepicker-meridian" maxlength="2"></td></tr><tr><td><a href="#" data-action="decrementHour"><i class="fa fa-chevron-down"></i></a></td><td class="separator"></td><td><a href="#" data-action="decrementMinute"><i class="fa fa-chevron-down"></i></a></td><td class="separator">&nbsp;</td><td><a href="#" data-action="decrementSecond"><i class="fa fa-chevron-down"></i></a></td><td class="separator">&nbsp;</td><td><a href="#" data-action="toggleMeridian"><i class="fa fa-chevron-down"></i></a></td></tr></tbody></table></div>
                        <input type="text" id="example-timepicker" name="example-timepicker" class="form-control input-timepicker text-center">
                        <span class="input-group-btn">
                            <a href="javascript:void(0)" class="btn btn-default"><i class="fa fa-clock-o"></i></a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="example-timepicker24">Select Time (24h)</label>
                <div class="col-md-2">
                    <div class="input-group bootstrap-timepicker"><div class="bootstrap-timepicker-widget dropdown-menu"><table><tbody><tr><td><a href="#" data-action="incrementHour"><i class="fa fa-chevron-up"></i></a></td><td class="separator">&nbsp;</td><td><a href="#" data-action="incrementMinute"><i class="fa fa-chevron-up"></i></a></td><td class="separator">&nbsp;</td><td><a href="#" data-action="incrementSecond"><i class="fa fa-chevron-up"></i></a></td></tr><tr><td><input type="text" class="form-control bootstrap-timepicker-hour" maxlength="2"></td> <td class="separator">:</td><td><input type="text" class="form-control bootstrap-timepicker-minute" maxlength="2"></td> <td class="separator">:</td><td><input type="text" class="form-control bootstrap-timepicker-second" maxlength="2"></td></tr><tr><td><a href="#" data-action="decrementHour"><i class="fa fa-chevron-down"></i></a></td><td class="separator"></td><td><a href="#" data-action="decrementMinute"><i class="fa fa-chevron-down"></i></a></td><td class="separator">&nbsp;</td><td><a href="#" data-action="decrementSecond"><i class="fa fa-chevron-down"></i></a></td></tr></tbody></table></div>
                        <input type="text" id="example-timepicker24" name="example-timepicker24" class="form-control input-timepicker24 text-center">
                        <span class="input-group-btn">
                            <a href="javascript:void(0)" class="btn btn-default"><i class="fa fa-clock-o"></i></a>
                        </span>
                    </div>
                </div>
            </div>
            <!-- Datepicker for Bootstrap, for usage examples you can check out http://eternicode.github.io/bootstrap-datepicker -->
            <h4 class="sub-header">Datepickers <small><code>.input-datepicker</code></small></h4>
            <div class="form-group">
                <label class="col-md-2 control-label">Inline Datepicker</label>
                <div class="col-md-2">
                    <div id="example-datepicker-inline" class="input-datepicker"><div class="datepicker datepicker-inline"><div class="datepicker-days" style="display: block;"><table class=" table-condensed"><thead><tr><th class="prev" style="visibility: visible;">«</th><th colspan="5" class="datepicker-switch">December 2020</th><th class="next" style="visibility: visible;">»</th></tr><tr><th class="dow">Su</th><th class="dow">Mo</th><th class="dow">Tu</th><th class="dow">We</th><th class="dow">Th</th><th class="dow">Fr</th><th class="dow">Sa</th></tr></thead><tbody><tr><td class="old day">29</td><td class="old day">30</td><td class="day">1</td><td class="day">2</td><td class="day">3</td><td class="day">4</td><td class="day">5</td></tr><tr><td class="day">6</td><td class="day">7</td><td class="day">8</td><td class="day">9</td><td class="day">10</td><td class="day">11</td><td class="day">12</td></tr><tr><td class="day">13</td><td class="day">14</td><td class="active day">15</td><td class="day">16</td><td class="day">17</td><td class="day">18</td><td class="day">19</td></tr><tr><td class="day">20</td><td class="day">21</td><td class="day">22</td><td class="day">23</td><td class="day">24</td><td class="day">25</td><td class="day">26</td></tr><tr><td class="day">27</td><td class="day">28</td><td class="day">29</td><td class="day">30</td><td class="day">31</td><td class="new day">1</td><td class="new day">2</td></tr><tr><td class="new day">3</td><td class="new day">4</td><td class="new day">5</td><td class="new day">6</td><td class="new day">7</td><td class="new day">8</td><td class="new day">9</td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table></div><div class="datepicker-months" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev" style="visibility: visible;">«</th><th colspan="5" class="datepicker-switch">2020</th><th class="next" style="visibility: visible;">»</th></tr></thead><tbody><tr><td colspan="7"><span class="month">Jan</span><span class="month">Feb</span><span class="month">Mar</span><span class="month">Apr</span><span class="month">May</span><span class="month">Jun</span><span class="month">Jul</span><span class="month">Aug</span><span class="month">Sep</span><span class="month">Oct</span><span class="month">Nov</span><span class="month active">Dec</span></td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table></div><div class="datepicker-years" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev" style="visibility: visible;">«</th><th colspan="5" class="datepicker-switch">2020-2029</th><th class="next" style="visibility: visible;">»</th></tr></thead><tbody><tr><td colspan="7"><span class="year old">2019</span><span class="year active">2020</span><span class="year">2021</span><span class="year">2022</span><span class="year">2023</span><span class="year">2024</span><span class="year">2025</span><span class="year">2026</span><span class="year">2027</span><span class="year">2028</span><span class="year">2029</span><span class="year new">2030</span></td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table></div></div></div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="example-datepicker">Datepicker</label>
                <div class="col-md-2">
                    <input type="text" id="example-datepicker" name="example-datepicker" class="form-control input-datepicker text-center" data-date-format="mm/dd/yy" placeholder="mm/dd/yy">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label"></label>
                <div class="col-md-2">
                    <input type="text" id="example-datepicker2" name="example-datepicker2" class="form-control input-datepicker text-center" data-date-format="dd/mm/yy" placeholder="dd/mm/yy">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2" for="example-datepicker3">Datepicker (auto close on select)</label>
                <div class="col-md-2">
                    <input type="text" id="example-datepicker3" name="example-datepicker3" class="form-control input-datepicker-close text-center" data-date-format="mm/dd/yy" placeholder="mm/dd/yy">
                </div>
            </div>
            <!-- Datepicker for Bootstrap, for usage examples you can check out http://eternicode.github.io/bootstrap-datepicker -->
            <h4 class="sub-header">Date Range Picker <small><code>.input-daterange</code></small></h4>
            <div class="form-group">
                <label class="col-md-2 control-label" for="example-daterange1">Select Date Range</label>
                <div class="col-md-4">
                    <div class="input-group input-daterange" data-date-format="mm/dd/yyyy">
                        <input type="text" id="example-daterange1" name="example-daterange1" class="form-control text-center" placeholder="From">
                        <span class="input-group-addon"><i class="fa fa-angle-right"></i></span>
                        <input type="text" id="example-daterange2" name="example-daterange2" class="form-control text-center" placeholder="To">
                    </div>
                </div>
            </div>
            <!-- Datetimepicker for Bootstrap, for usage examples you can check out http://eonasdan.github.io/bootstrap-datetimepicker/ -->
            <h4 class="sub-header">Datetimepicker for Bootstrap <small><code>.input-datetimepicker</code></small></h4>
            <div class="form-group">
                <label class="col-md-2 control-label">Datetimepicker</label>
                <div class="col-md-3">
                    <div class="input-datetimepicker input-group date">
                        <input type="text" class="form-control">
                        <span class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </span>
                    </div>
                </div>
            </div>
            <!-- Jquery Tags Input, for extra usage examples you can check out https://github.com/xoxco/jQuery-Tags-Input -->
            <h4 class="sub-header">Tags Input <small><code>.input-tags</code></small></h4>
            <div class="form-group">
                <label class="col-md-2 control-label">Enter tags</label>
                <div class="col-md-10">
                    <input type="text" id="example-tags" name="example-tags" class="input-tags" value="html,css" style="display: none;"><div id="example-tags_tagsinput" class="tagsinput" style="width: auto; height: auto;"><span class="tag"><span>html  </span><a href="#" title="Removing tag">x</a></span><span class="tag"><span>css  </span><a href="#" title="Removing tag">x</a></span><div id="example-tags_addTag"><input id="example-tags_tag" value="" data-default="add a tag" style="color: rgb(102, 102, 102); width: 68px;"></div><div class="tags_clear"></div></div>
                </div>
            </div>
            <h4 class="sub-header">CSS Switches <small>(&gt; IE8)</small></h4>
            <div class="form-group">
                <label class="col-md-2 control-label">Checked</label>
                <div class="col-md-10">
                    <label class="switch switch-default"><input type="checkbox" checked=""><span></span></label>
                    <label class="switch switch-primary"><input type="checkbox" checked=""><span></span></label>
                    <label class="switch switch-info"><input type="checkbox" checked=""><span></span></label>
                    <label class="switch switch-success"><input type="checkbox" checked=""><span></span></label>
                    <label class="switch switch-warning"><input type="checkbox" checked=""><span></span></label>
                    <label class="switch switch-danger"><input type="checkbox" checked=""><span></span></label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Unchecked</label>
                <div class="col-md-10">
                    <label class="switch switch-default"><input type="checkbox"><span></span></label>
                    <label class="switch switch-primary"><input type="checkbox"><span></span></label>
                    <label class="switch switch-info"><input type="checkbox"><span></span></label>
                    <label class="switch switch-success"><input type="checkbox"><span></span></label>
                    <label class="switch switch-warning"><input type="checkbox"><span></span></label>
                    <label class="switch switch-danger"><input type="checkbox"><span></span></label>
                </div>
            </div>
            <!-- Slider for Bootstrap (class is initialized in js/main.js -> uiInit()), for extra usage examples you can check out http://www.eyecon.ro/bootstrap-slider -->
            <h4 class="sub-header">Sliders</h4>
            <div class="form-group">
                <label class="col-md-2 control-label">Horizontal</label>
                <div class="col-md-10">
                    <div class="slider slider-horizontal" style="width: 862px;"><div class="slider-track"><div class="slider-selection" style="left: 0%; width: 20%;"></div><div class="slider-handle round" style="left: 20%;"></div><div class="slider-handle round hide" style="left: 0%;"></div></div><div class="tooltip top" style="top: -36px; left: 155.9px;"><div class="tooltip-arrow"></div><div class="tooltip-inner">20</div></div><input type="text" id="example-slider-hor1" name="example-slider-hor1" class="form-control input-slider" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="20" data-slider-orientation="horizontal" data-slider-selection="before" data-slider-tooltip="show" style=""></div>
                    <div class="slider slider-horizontal" style="width: 862px;"><div class="slider-track"><div class="slider-selection" style="left: 0%; width: 40%;"></div><div class="slider-handle round" style="left: 40%;"></div><div class="slider-handle round hide" style="left: 0%;"></div></div><div class="tooltip top" style="top: -36px; left: 328.3px;"><div class="tooltip-arrow"></div><div class="tooltip-inner">40</div></div><input type="text" id="example-slider-hor2" name="example-slider-hor2" class="form-control input-slider" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="40" data-slider-orientation="horizontal" data-slider-selection="before" data-slider-tooltip="show" style=""></div>
                    <div class="slider slider-horizontal" style="width: 862px;"><div class="slider-track"><div class="slider-selection" style="left: 0%; width: 60%;"></div><div class="slider-handle round" style="left: 60%;"></div><div class="slider-handle round hide" style="left: 0%;"></div></div><div class="tooltip top" style="top: -36px; left: 500.7px;"><div class="tooltip-arrow"></div><div class="tooltip-inner">60</div></div><input type="text" id="example-slider-hor3" name="example-slider-hor3" class="form-control input-slider" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="60" data-slider-orientation="horizontal" data-slider-selection="before" data-slider-tooltip="show" style=""></div>
                    <div class="slider slider-horizontal" style="width: 862px;"><div class="slider-track"><div class="slider-selection" style="left: 0%; width: 80%;"></div><div class="slider-handle round" style="left: 80%;"></div><div class="slider-handle round hide" style="left: 0%;"></div></div><div class="tooltip top" style="top: -36px; left: 673.1px;"><div class="tooltip-arrow"></div><div class="tooltip-inner">80</div></div><input type="text" id="example-slider-hor4" name="example-slider-hor4" class="form-control input-slider" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="80" data-slider-orientation="horizontal" data-slider-selection="before" data-slider-tooltip="show" style=""></div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Vertical</label>
                <div class="col-md-10">
                    <div class="slider slider-vertical"><div class="slider-track"><div class="slider-selection" style="top: 40%; height: 60%;"></div><div class="slider-handle round" style="top: 40%;"></div><div class="slider-handle round hide" style="top: 100%;"></div></div><div class="tooltip right hide" style="left: 100%; top: 70px;"><div class="tooltip-arrow"></div><div class="tooltip-inner">40</div></div><input type="text" id="example-slider-vert1" name="example-slider-vert1" class="form-control input-slider" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="40" data-slider-orientation="vertical" data-slider-selection="after" data-slider-tooltip="hide"></div>
                    <div class="slider slider-vertical"><div class="slider-track"><div class="slider-selection" style="top: 60%; height: 40%;"></div><div class="slider-handle round" style="top: 60%;"></div><div class="slider-handle round hide" style="top: 100%;"></div></div><div class="tooltip right hide" style="left: 100%; top: 112px;"><div class="tooltip-arrow"></div><div class="tooltip-inner">60</div></div><input type="text" id="example-slider-vert2" name="example-slider-vert2" class="form-control input-slider" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="60" data-slider-orientation="vertical" data-slider-selection="after" data-slider-tooltip="hide"></div>
                    <div class="slider slider-vertical"><div class="slider-track"><div class="slider-selection" style="top: 40%; height: 60%;"></div><div class="slider-handle round" style="top: 40%;"></div><div class="slider-handle round hide" style="top: 100%;"></div></div><div class="tooltip right hide" style="left: 100%; top: 70px;"><div class="tooltip-arrow"></div><div class="tooltip-inner">40</div></div><input type="text" id="example-slider-vert3" name="example-slider-vert3" class="form-control input-slider" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="40" data-slider-orientation="vertical" data-slider-selection="after" data-slider-tooltip="hide"></div>
                    <div class="slider slider-vertical"><div class="slider-track"><div class="slider-selection" style="top: 60%; height: 40%;"></div><div class="slider-handle round" style="top: 60%;"></div><div class="slider-handle round hide" style="top: 100%;"></div></div><div class="tooltip right hide" style="left: 100%; top: 112px;"><div class="tooltip-arrow"></div><div class="tooltip-inner">60</div></div><input type="text" id="example-slider-vert4" name="example-slider-vert4" class="form-control input-slider" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="60" data-slider-orientation="vertical" data-slider-selection="after" data-slider-tooltip="hide"></div>
                    <div class="slider slider-vertical"><div class="slider-track"><div class="slider-selection" style="top: 40%; height: 60%;"></div><div class="slider-handle round" style="top: 40%;"></div><div class="slider-handle round hide" style="top: 100%;"></div></div><div class="tooltip right hide" style="left: 100%; top: 70px;"><div class="tooltip-arrow"></div><div class="tooltip-inner">40</div></div><input type="text" id="example-slider-vert5" name="example-slider-vert5" class="form-control input-slider" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="40" data-slider-orientation="vertical" data-slider-selection="after" data-slider-tooltip="hide"></div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Range</label>
                <div class="col-md-10">
                    <div class="slider slider-horizontal" style="width: 862px;"><div class="slider-track"><div class="slider-selection" style="left: 40%; width: 20%;"></div><div class="slider-handle round" style="left: 40%;"></div><div class="slider-handle round" style="left: 60%;"></div></div><div class="tooltip top" style="top: -36px; left: 396px;"><div class="tooltip-arrow"></div><div class="tooltip-inner">400 : 600</div></div><input type="text" id="example-slider-range1" name="example-slider-range1" class="form-control input-slider" data-slider-min="0" data-slider-max="1000" data-slider-step="1" data-slider-value="[400,600]" data-slider-orientation="horizontal" data-slider-tooltip="show" style=""></div>
                    <div class="slider slider-horizontal" style="width: 862px;"><div class="slider-track"><div class="slider-selection" style="left: 25%; width: 50%;"></div><div class="slider-handle round" style="left: 25%;"></div><div class="slider-handle round" style="left: 75%;"></div></div><div class="tooltip top hide" style="top: -36px; left: 396px;"><div class="tooltip-arrow"></div><div class="tooltip-inner">250 : 750</div></div><input type="text" id="example-slider-range2" name="example-slider-range2" class="form-control input-slider" data-slider-min="0" data-slider-max="1000" data-slider-step="1" data-slider-value="[250,750]" data-slider-orientation="horizontal" data-slider-tooltip="hide" style=""></div>
                    <div class="slider slider-horizontal" style="width: 862px;"><div class="slider-track"><div class="slider-selection" style="left: 10%; width: 80%;"></div><div class="slider-handle round" style="left: 10%;"></div><div class="slider-handle round" style="left: 90%;"></div></div><div class="tooltip top hide" style="top: -36px; left: 396px;"><div class="tooltip-arrow"></div><div class="tooltip-inner">100 : 900</div></div><input type="text" id="example-slider-range3" name="example-slider-range3" class="form-control input-slider" data-slider-min="0" data-slider-max="1000" data-slider-step="1" data-slider-value="[100,900]" data-slider-orientation="horizontal" data-slider-tooltip="hide" style=""></div>
                </div>
            </div>
        </form>
        <!-- END Various Components Content -->
    </div>
    <!-- END Various Components Block -->

    <!-- Textareas and Editor Block -->
    <div class="block">
        <!-- Textareas and Editor Title -->
        <div class="block-title">
            <h2><i class="fa fa-pencil"></i> Textareas and Editor</h2>
        </div>
        <!-- END Textareas and Editor Title -->

        <!-- Textareas and Editor Content -->
        <form action="page_forms_components.html" method="post" class="form-horizontal" onsubmit="return false;">
            <div class="form-group">
                <label class="col-md-2 control-label" for="default-textarea">Default</label>
                <div class="col-md-10">
                    <textarea id="default-textarea" name="default-textarea" rows="6" class="form-control" placeholder="..."></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="disabled-textarea">Disabled</label>
                <div class="col-md-10">
                    <textarea id="disabled-textarea" name="disabled-textarea" rows="6" class="form-control" disabled="" placeholder="..."></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="small-textarea">Small</label>
                <div class="col-md-2">
                    <textarea id="small-textarea" name="small-textarea" rows="4" class="form-control" placeholder="..."></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="medium-textarea">Medium</label>
                <div class="col-md-4">
                    <textarea id="medium-textarea" name="medium-textarea" rows="5" class="form-control" placeholder="..."></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="large-textarea">Large</label>
                <div class="col-md-6">
                    <textarea id="large-textarea" name="large-textarea" rows="6" class="form-control" placeholder="..."></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="textarea-wysiwyg">WYSIWYG Editor</label>
                <div class="col-md-10">
                    <ul class="wysihtml5-toolbar" style=""><li class="dropdown"><a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-font"></i>&nbsp;<span class="current-font">Normal text</span>&nbsp;<b class="caret"></b></a><ul class="dropdown-menu"><li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="div" href="javascript:;" unselectable="on">Normal text</a></li><li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h1" href="javascript:;" unselectable="on">Heading 1</a></li><li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h2" href="javascript:;" unselectable="on">Heading 2</a></li></ul></li><li><div class="btn-group"><a class="btn btn-default" data-wysihtml5-command="bold" title="CTRL+B" href="javascript:;" unselectable="on">Bold</a><a class="btn btn-default" data-wysihtml5-command="italic" title="CTRL+I" href="javascript:;" unselectable="on">Italic</a><a class="btn btn-default" data-wysihtml5-command="underline" title="CTRL+U" href="javascript:;" unselectable="on">Underline</a></div></li><li><div class="btn-group"><a class="btn btn-default" data-wysihtml5-command="insertUnorderedList" title="Unordered List" href="javascript:;" unselectable="on"><i class="fa fa-list"></i></a><a class="btn btn-default" data-wysihtml5-command="insertOrderedList" title="Ordered List" href="javascript:;" unselectable="on"><i class="fa fa-th-list"></i></a><a class="btn btn-default" data-wysihtml5-command="Outdent" title="Outdent" href="javascript:;" unselectable="on"><i class="fa fa-indent"></i></a><a class="btn btn-default" data-wysihtml5-command="Indent" title="Indent" href="javascript:;" unselectable="on"><i class="fa fa-outdent"></i></a></div></li><li><div class="bootstrap-wysihtml5-insert-link-modal modal fade"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><a class="close" data-dismiss="modal">×</a><h3>Insert Link</h3></div><div class="modal-body"><input value="http://" class="bootstrap-wysihtml5-insert-link-url form-control"></div><div class="modal-footer"><a href="#" class="btn btn-default" data-dismiss="modal">Cancel</a><a href="#" class="btn btn-primary" data-dismiss="modal">Insert link</a></div></div></div></div><a class="btn btn-default" data-wysihtml5-command="createLink" title="Link" href="javascript:;" unselectable="on"><i class="fa fa-share-square-o"></i></a></li><li><div class="bootstrap-wysihtml5-insert-image-modal modal fade"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><a class="close" data-dismiss="modal">×</a><h3>Insert Image</h3></div><div class="modal-body"><input value="http://" class="bootstrap-wysihtml5-insert-image-url form-control"></div><div class="modal-footer"><a href="#" class="btn btn-default" data-dismiss="modal">Cancel</a><a href="#" class="btn btn-primary" data-dismiss="modal">Insert image</a></div></div></div></div><a class="btn btn-default" data-wysihtml5-command="insertImage" title="Insert image" href="javascript:;" unselectable="on"><i class="fa fa-picture-o"></i></a></li></ul><textarea id="textarea-wysiwyg" name="textarea-wysiwyg" rows="15" class="form-control textarea-editor" style="display: none;"></textarea><input type="hidden" name="_wysihtml5_mode" value="1"><iframe class="wysihtml5-sandbox" security="restricted" allowtransparency="true" frameborder="0" width="0" height="0" marginwidth="0" marginheight="0" style="background-color: rgb(255, 255, 255); border-collapse: separate; border-color: rgb(217, 217, 217); border-style: solid; border-width: 1px; clear: none; display: block; float: none; margin: 0px; outline: rgb(51, 51, 51) none 0px; outline-offset: 0px; padding: 6px 8px; position: static; z-index: auto; vertical-align: baseline; text-align: start; box-sizing: border-box; box-shadow: rgb(217, 217, 217) 0px 1px 0px 0px; border-radius: 0px; width: 862px; height: 284px; top: auto; left: auto; right: auto; bottom: auto;"></iframe>
                    <div class="help-block"><code>.textarea-editor</code></div>
                </div>
            </div>
            <!-- CKEditor, you just need to include the plugin (see at the bottom of this page) and add the class 'ckeditor' to your textarea -->
            <!-- More info can be found at http://ckeditor.com -->
            <div class="form-group">
                <label class="col-md-2 control-label" for="textarea-ckeditor">CKEditor</label>
                <div class="col-md-10">
                    <textarea id="textarea-ckeditor" name="textarea-ckeditor" class="ckeditor" style="visibility: hidden; display: none;"></textarea><div id="cke_textarea-ckeditor" class="cke_1 cke cke_reset cke_chrome cke_editor_textarea-ckeditor cke_ltr cke_browser_webkit" dir="ltr" lang="en" role="application" aria-labelledby="cke_textarea-ckeditor_arialbl"><span id="cke_textarea-ckeditor_arialbl" class="cke_voice_label">Rich Text Editor, textarea-ckeditor</span><div class="cke_inner cke_reset" role="presentation"><span id="cke_1_top" class="cke_top cke_reset_all" role="presentation" style="height: auto; user-select: none;"><span id="cke_9" class="cke_voice_label">Editor toolbars</span><span id="cke_1_toolbox" class="cke_toolbox" role="group" aria-labelledby="cke_9" onmousedown="return false;"><span id="cke_14" class="cke_toolbar" aria-labelledby="cke_14_label" role="toolbar"><span id="cke_14_label" class="cke_voice_label">Document</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><a id="cke_15" class="cke_button cke_button__source  cke_button_off" href="javascript:void('Source')" title="Source" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_15_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(2,event);" onfocus="return CKEDITOR.tools.callFunction(3,event);" onclick="CKEDITOR.tools.callFunction(4,this);return false;"><span class="cke_button_icon cke_button__source_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -1824px;background-size:auto;">&nbsp;</span><span id="cke_15_label" class="cke_button_label cke_button__source_label" aria-hidden="false">Source</span></a><span class="cke_toolbar_separator" role="separator"></span><a id="cke_16" class="cke_button cke_button__save  cke_button_off" href="javascript:void('Save')" title="Save" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_16_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(5,event);" onfocus="return CKEDITOR.tools.callFunction(6,event);" onclick="CKEDITOR.tools.callFunction(7,this);return false;"><span class="cke_button_icon cke_button__save_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -1704px;background-size:auto;">&nbsp;</span><span id="cke_16_label" class="cke_button_label cke_button__save_label" aria-hidden="false">Save</span></a><a id="cke_17" class="cke_button cke_button__newpage  cke_button_off" href="javascript:void('New Page')" title="New Page" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_17_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(8,event);" onfocus="return CKEDITOR.tools.callFunction(9,event);" onclick="CKEDITOR.tools.callFunction(10,this);return false;"><span class="cke_button_icon cke_button__newpage_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -1440px;background-size:auto;">&nbsp;</span><span id="cke_17_label" class="cke_button_label cke_button__newpage_label" aria-hidden="false">New Page</span></a><a id="cke_18" class="cke_button cke_button__preview  cke_button_off" href="javascript:void('Preview')" title="Preview" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_18_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(11,event);" onfocus="return CKEDITOR.tools.callFunction(12,event);" onclick="CKEDITOR.tools.callFunction(13,this);return false;"><span class="cke_button_icon cke_button__preview_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -1632px;background-size:auto;">&nbsp;</span><span id="cke_18_label" class="cke_button_label cke_button__preview_label" aria-hidden="false">Preview</span></a><a id="cke_19" class="cke_button cke_button__print  cke_button_off" href="javascript:void('Print')" title="Print" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_19_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(14,event);" onfocus="return CKEDITOR.tools.callFunction(15,event);" onclick="CKEDITOR.tools.callFunction(16,this);return false;"><span class="cke_button_icon cke_button__print_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -1656px;background-size:auto;">&nbsp;</span><span id="cke_19_label" class="cke_button_label cke_button__print_label" aria-hidden="false">Print</span></a><span class="cke_toolbar_separator" role="separator"></span><a id="cke_20" class="cke_button cke_button__templates  cke_button_off" href="javascript:void('Templates')" title="Templates" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_20_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(17,event);" onfocus="return CKEDITOR.tools.callFunction(18,event);" onclick="CKEDITOR.tools.callFunction(19,this);return false;"><span class="cke_button_icon cke_button__templates_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -456px;background-size:auto;">&nbsp;</span><span id="cke_20_label" class="cke_button_label cke_button__templates_label" aria-hidden="false">Templates</span></a></span><span class="cke_toolbar_end"></span></span><span id="cke_21" class="cke_toolbar" aria-labelledby="cke_21_label" role="toolbar"><span id="cke_21_label" class="cke_voice_label">Clipboard/Undo</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><a id="cke_22" class="cke_button cke_button__cut cke_button_disabled " href="javascript:void('Cut')" title="Cut" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_22_label" aria-haspopup="false" aria-disabled="true" onkeydown="return CKEDITOR.tools.callFunction(20,event);" onfocus="return CKEDITOR.tools.callFunction(21,event);" onclick="CKEDITOR.tools.callFunction(22,this);return false;"><span class="cke_button_icon cke_button__cut_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -312px;background-size:auto;">&nbsp;</span><span id="cke_22_label" class="cke_button_label cke_button__cut_label" aria-hidden="false">Cut</span></a><a id="cke_23" class="cke_button cke_button__copy cke_button_disabled " href="javascript:void('Copy')" title="Copy" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_23_label" aria-haspopup="false" aria-disabled="true" onkeydown="return CKEDITOR.tools.callFunction(23,event);" onfocus="return CKEDITOR.tools.callFunction(24,event);" onclick="CKEDITOR.tools.callFunction(25,this);return false;"><span class="cke_button_icon cke_button__copy_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -264px;background-size:auto;">&nbsp;</span><span id="cke_23_label" class="cke_button_label cke_button__copy_label" aria-hidden="false">Copy</span></a><a id="cke_24" class="cke_button cke_button__paste  cke_button_off" href="javascript:void('Paste')" title="Paste" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_24_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(26,event);" onfocus="return CKEDITOR.tools.callFunction(27,event);" onclick="CKEDITOR.tools.callFunction(28,this);return false;"><span class="cke_button_icon cke_button__paste_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -360px;background-size:auto;">&nbsp;</span><span id="cke_24_label" class="cke_button_label cke_button__paste_label" aria-hidden="false">Paste</span></a><a id="cke_25" class="cke_button cke_button__pastetext  cke_button_off" href="javascript:void('Paste as plain text')" title="Paste as plain text" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_25_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(29,event);" onfocus="return CKEDITOR.tools.callFunction(30,event);" onclick="CKEDITOR.tools.callFunction(31,this);return false;"><span class="cke_button_icon cke_button__pastetext_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -1536px;background-size:auto;">&nbsp;</span><span id="cke_25_label" class="cke_button_label cke_button__pastetext_label" aria-hidden="false">Paste as plain text</span></a><a id="cke_26" class="cke_button cke_button__pastefromword  cke_button_off" href="javascript:void('Paste from Word')" title="Paste from Word" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_26_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(32,event);" onfocus="return CKEDITOR.tools.callFunction(33,event);" onclick="CKEDITOR.tools.callFunction(34,this);return false;"><span class="cke_button_icon cke_button__pastefromword_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -1584px;background-size:auto;">&nbsp;</span><span id="cke_26_label" class="cke_button_label cke_button__pastefromword_label" aria-hidden="false">Paste from Word</span></a><span class="cke_toolbar_separator" role="separator"></span><a id="cke_27" class="cke_button cke_button__undo cke_button_disabled " href="javascript:void('Undo')" title="Undo" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_27_label" aria-haspopup="false" aria-disabled="true" onkeydown="return CKEDITOR.tools.callFunction(35,event);" onfocus="return CKEDITOR.tools.callFunction(36,event);" onclick="CKEDITOR.tools.callFunction(37,this);return false;"><span class="cke_button_icon cke_button__undo_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -1992px;background-size:auto;">&nbsp;</span><span id="cke_27_label" class="cke_button_label cke_button__undo_label" aria-hidden="false">Undo</span></a><a id="cke_28" class="cke_button cke_button__redo cke_button_disabled " href="javascript:void('Redo')" title="Redo" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_28_label" aria-haspopup="false" aria-disabled="true" onkeydown="return CKEDITOR.tools.callFunction(38,event);" onfocus="return CKEDITOR.tools.callFunction(39,event);" onclick="CKEDITOR.tools.callFunction(40,this);return false;"><span class="cke_button_icon cke_button__redo_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -1944px;background-size:auto;">&nbsp;</span><span id="cke_28_label" class="cke_button_label cke_button__redo_label" aria-hidden="false">Redo</span></a></span><span class="cke_toolbar_end"></span></span><span id="cke_29" class="cke_toolbar" aria-labelledby="cke_29_label" role="toolbar"><span id="cke_29_label" class="cke_voice_label">Editing</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><a id="cke_30" class="cke_button cke_button__find  cke_button_off" href="javascript:void('Find')" title="Find" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_30_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(41,event);" onfocus="return CKEDITOR.tools.callFunction(42,event);" onclick="CKEDITOR.tools.callFunction(43,this);return false;"><span class="cke_button_icon cke_button__find_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -528px;background-size:auto;">&nbsp;</span><span id="cke_30_label" class="cke_button_label cke_button__find_label" aria-hidden="false">Find</span></a><a id="cke_31" class="cke_button cke_button__replace  cke_button_off" href="javascript:void('Replace')" title="Replace" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_31_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(44,event);" onfocus="return CKEDITOR.tools.callFunction(45,event);" onclick="CKEDITOR.tools.callFunction(46,this);return false;"><span class="cke_button_icon cke_button__replace_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -552px;background-size:auto;">&nbsp;</span><span id="cke_31_label" class="cke_button_label cke_button__replace_label" aria-hidden="false">Replace</span></a><span class="cke_toolbar_separator" role="separator"></span><a id="cke_32" class="cke_button cke_button__selectall  cke_button_off" href="javascript:void('Select All')" title="Select All" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_32_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(47,event);" onfocus="return CKEDITOR.tools.callFunction(48,event);" onclick="CKEDITOR.tools.callFunction(49,this);return false;"><span class="cke_button_icon cke_button__selectall_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -1728px;background-size:auto;">&nbsp;</span><span id="cke_32_label" class="cke_button_label cke_button__selectall_label" aria-hidden="false">Select All</span></a><span class="cke_toolbar_separator" role="separator"></span><a id="cke_33" class="cke_button cke_button__scayt cke_button_off " href="javascript:void('Spell Checker')" title="Spell Checker" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_33_label" aria-haspopup="true" onkeydown="return CKEDITOR.tools.callFunction(50,event);" onfocus="return CKEDITOR.tools.callFunction(51,event);" onclick="CKEDITOR.tools.callFunction(52,this);return false;"><span class="cke_button_icon cke_button__scayt_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -1872px;background-size:auto;">&nbsp;</span><span id="cke_33_label" class="cke_button_label cke_button__scayt_label" aria-hidden="false">Spell Check As You Type</span><span class="cke_button_arrow"></span></a></span><span class="cke_toolbar_end"></span></span><span id="cke_34" class="cke_toolbar" aria-labelledby="cke_34_label" role="toolbar"><span id="cke_34_label" class="cke_voice_label">Forms</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><a id="cke_35" class="cke_button cke_button__form  cke_button_off" href="javascript:void('Form')" title="Form" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_35_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(53,event);" onfocus="return CKEDITOR.tools.callFunction(54,event);" onclick="CKEDITOR.tools.callFunction(55,this);return false;"><span class="cke_button_icon cke_button__form_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -648px;background-size:auto;">&nbsp;</span><span id="cke_35_label" class="cke_button_label cke_button__form_label" aria-hidden="false">Form</span></a><a id="cke_36" class="cke_button cke_button__checkbox  cke_button_off" href="javascript:void('Checkbox')" title="Checkbox" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_36_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(56,event);" onfocus="return CKEDITOR.tools.callFunction(57,event);" onclick="CKEDITOR.tools.callFunction(58,this);return false;"><span class="cke_button_icon cke_button__checkbox_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -624px;background-size:auto;">&nbsp;</span><span id="cke_36_label" class="cke_button_label cke_button__checkbox_label" aria-hidden="false">Checkbox</span></a><a id="cke_37" class="cke_button cke_button__radio  cke_button_off" href="javascript:void('Radio Button')" title="Radio Button" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_37_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(59,event);" onfocus="return CKEDITOR.tools.callFunction(60,event);" onclick="CKEDITOR.tools.callFunction(61,this);return false;"><span class="cke_button_icon cke_button__radio_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -720px;background-size:auto;">&nbsp;</span><span id="cke_37_label" class="cke_button_label cke_button__radio_label" aria-hidden="false">Radio Button</span></a><a id="cke_38" class="cke_button cke_button__textfield  cke_button_off" href="javascript:void('Text Field')" title="Text Field" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_38_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(62,event);" onfocus="return CKEDITOR.tools.callFunction(63,event);" onclick="CKEDITOR.tools.callFunction(64,this);return false;"><span class="cke_button_icon cke_button__textfield_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -864px;background-size:auto;">&nbsp;</span><span id="cke_38_label" class="cke_button_label cke_button__textfield_label" aria-hidden="false">Text Field</span></a><a id="cke_39" class="cke_button cke_button__textarea  cke_button_off" href="javascript:void('Textarea')" title="Textarea" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_39_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(65,event);" onfocus="return CKEDITOR.tools.callFunction(66,event);" onclick="CKEDITOR.tools.callFunction(67,this);return false;"><span class="cke_button_icon cke_button__textarea_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -816px;background-size:auto;">&nbsp;</span><span id="cke_39_label" class="cke_button_label cke_button__textarea_label" aria-hidden="false">Textarea</span></a><a id="cke_40" class="cke_button cke_button__select  cke_button_off" href="javascript:void('Selection Field')" title="Selection Field" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_40_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(68,event);" onfocus="return CKEDITOR.tools.callFunction(69,event);" onclick="CKEDITOR.tools.callFunction(70,this);return false;"><span class="cke_button_icon cke_button__select_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -768px;background-size:auto;">&nbsp;</span><span id="cke_40_label" class="cke_button_label cke_button__select_label" aria-hidden="false">Selection Field</span></a><a id="cke_41" class="cke_button cke_button__button  cke_button_off" href="javascript:void('Button')" title="Button" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_41_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(71,event);" onfocus="return CKEDITOR.tools.callFunction(72,event);" onclick="CKEDITOR.tools.callFunction(73,this);return false;"><span class="cke_button_icon cke_button__button_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -600px;background-size:auto;">&nbsp;</span><span id="cke_41_label" class="cke_button_label cke_button__button_label" aria-hidden="false">Button</span></a><a id="cke_42" class="cke_button cke_button__imagebutton  cke_button_off" href="javascript:void('Image Button')" title="Image Button" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_42_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(74,event);" onfocus="return CKEDITOR.tools.callFunction(75,event);" onclick="CKEDITOR.tools.callFunction(76,this);return false;"><span class="cke_button_icon cke_button__imagebutton_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -696px;background-size:auto;">&nbsp;</span><span id="cke_42_label" class="cke_button_label cke_button__imagebutton_label" aria-hidden="false">Image Button</span></a><a id="cke_43" class="cke_button cke_button__hiddenfield  cke_button_off" href="javascript:void('Hidden Field')" title="Hidden Field" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_43_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(77,event);" onfocus="return CKEDITOR.tools.callFunction(78,event);" onclick="CKEDITOR.tools.callFunction(79,this);return false;"><span class="cke_button_icon cke_button__hiddenfield_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -672px;background-size:auto;">&nbsp;</span><span id="cke_43_label" class="cke_button_label cke_button__hiddenfield_label" aria-hidden="false">Hidden Field</span></a></span><span class="cke_toolbar_end"></span></span><span class="cke_toolbar_break"></span><span id="cke_44" class="cke_toolbar" aria-labelledby="cke_44_label" role="toolbar"><span id="cke_44_label" class="cke_voice_label">Basic Styles</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><a id="cke_45" class="cke_button cke_button__bold  cke_button_off" href="javascript:void('Bold')" title="Bold" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_45_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(80,event);" onfocus="return CKEDITOR.tools.callFunction(81,event);" onclick="CKEDITOR.tools.callFunction(82,this);return false;"><span class="cke_button_icon cke_button__bold_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -24px;background-size:auto;">&nbsp;</span><span id="cke_45_label" class="cke_button_label cke_button__bold_label" aria-hidden="false">Bold</span></a><a id="cke_46" class="cke_button cke_button__italic  cke_button_off" href="javascript:void('Italic')" title="Italic" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_46_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(83,event);" onfocus="return CKEDITOR.tools.callFunction(84,event);" onclick="CKEDITOR.tools.callFunction(85,this);return false;"><span class="cke_button_icon cke_button__italic_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -48px;background-size:auto;">&nbsp;</span><span id="cke_46_label" class="cke_button_label cke_button__italic_label" aria-hidden="false">Italic</span></a><a id="cke_47" class="cke_button cke_button__underline  cke_button_off" href="javascript:void('Underline')" title="Underline" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_47_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(86,event);" onfocus="return CKEDITOR.tools.callFunction(87,event);" onclick="CKEDITOR.tools.callFunction(88,this);return false;"><span class="cke_button_icon cke_button__underline_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -144px;background-size:auto;">&nbsp;</span><span id="cke_47_label" class="cke_button_label cke_button__underline_label" aria-hidden="false">Underline</span></a><a id="cke_48" class="cke_button cke_button__strike  cke_button_off" href="javascript:void('Strikethrough')" title="Strikethrough" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_48_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(89,event);" onfocus="return CKEDITOR.tools.callFunction(90,event);" onclick="CKEDITOR.tools.callFunction(91,this);return false;"><span class="cke_button_icon cke_button__strike_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -72px;background-size:auto;">&nbsp;</span><span id="cke_48_label" class="cke_button_label cke_button__strike_label" aria-hidden="false">Strikethrough</span></a><a id="cke_49" class="cke_button cke_button__subscript  cke_button_off" href="javascript:void('Subscript')" title="Subscript" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_49_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(92,event);" onfocus="return CKEDITOR.tools.callFunction(93,event);" onclick="CKEDITOR.tools.callFunction(94,this);return false;"><span class="cke_button_icon cke_button__subscript_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -96px;background-size:auto;">&nbsp;</span><span id="cke_49_label" class="cke_button_label cke_button__subscript_label" aria-hidden="false">Subscript</span></a><a id="cke_50" class="cke_button cke_button__superscript  cke_button_off" href="javascript:void('Superscript')" title="Superscript" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_50_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(95,event);" onfocus="return CKEDITOR.tools.callFunction(96,event);" onclick="CKEDITOR.tools.callFunction(97,this);return false;"><span class="cke_button_icon cke_button__superscript_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -120px;background-size:auto;">&nbsp;</span><span id="cke_50_label" class="cke_button_label cke_button__superscript_label" aria-hidden="false">Superscript</span></a><span class="cke_toolbar_separator" role="separator"></span><a id="cke_51" class="cke_button cke_button__removeformat  cke_button_off" href="javascript:void('Remove Format')" title="Remove Format" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_51_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(98,event);" onfocus="return CKEDITOR.tools.callFunction(99,event);" onclick="CKEDITOR.tools.callFunction(100,this);return false;"><span class="cke_button_icon cke_button__removeformat_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -1680px;background-size:auto;">&nbsp;</span><span id="cke_51_label" class="cke_button_label cke_button__removeformat_label" aria-hidden="false">Remove Format</span></a></span><span class="cke_toolbar_end"></span></span><span id="cke_52" class="cke_toolbar" aria-labelledby="cke_52_label" role="toolbar"><span id="cke_52_label" class="cke_voice_label">Paragraph</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><a id="cke_53" class="cke_button cke_button__numberedlist  cke_button_off" href="javascript:void('Insert/Remove Numbered List')" title="Insert/Remove Numbered List" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_53_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(101,event);" onfocus="return CKEDITOR.tools.callFunction(102,event);" onclick="CKEDITOR.tools.callFunction(103,this);return false;"><span class="cke_button_icon cke_button__numberedlist_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -1368px;background-size:auto;">&nbsp;</span><span id="cke_53_label" class="cke_button_label cke_button__numberedlist_label" aria-hidden="false">Insert/Remove Numbered List</span></a><a id="cke_54" class="cke_button cke_button__bulletedlist  cke_button_off" href="javascript:void('Insert/Remove Bulleted List')" title="Insert/Remove Bulleted List" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_54_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(104,event);" onfocus="return CKEDITOR.tools.callFunction(105,event);" onclick="CKEDITOR.tools.callFunction(106,this);return false;"><span class="cke_button_icon cke_button__bulletedlist_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -1320px;background-size:auto;">&nbsp;</span><span id="cke_54_label" class="cke_button_label cke_button__bulletedlist_label" aria-hidden="false">Insert/Remove Bulleted List</span></a><span class="cke_toolbar_separator" role="separator"></span><a id="cke_55" class="cke_button cke_button__outdent cke_button_disabled " href="javascript:void('Decrease Indent')" title="Decrease Indent" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_55_label" aria-haspopup="false" aria-disabled="true" onkeydown="return CKEDITOR.tools.callFunction(107,event);" onfocus="return CKEDITOR.tools.callFunction(108,event);" onclick="CKEDITOR.tools.callFunction(109,this);return false;"><span class="cke_button_icon cke_button__outdent_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -1032px;background-size:auto;">&nbsp;</span><span id="cke_55_label" class="cke_button_label cke_button__outdent_label" aria-hidden="false">Decrease Indent</span></a><a id="cke_56" class="cke_button cke_button__indent  cke_button_off" href="javascript:void('Increase Indent')" title="Increase Indent" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_56_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(110,event);" onfocus="return CKEDITOR.tools.callFunction(111,event);" onclick="CKEDITOR.tools.callFunction(112,this);return false;"><span class="cke_button_icon cke_button__indent_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -984px;background-size:auto;">&nbsp;</span><span id="cke_56_label" class="cke_button_label cke_button__indent_label" aria-hidden="false">Increase Indent</span></a><span class="cke_toolbar_separator" role="separator"></span><a id="cke_57" class="cke_button cke_button__blockquote  cke_button_off" href="javascript:void('Block Quote')" title="Block Quote" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_57_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(113,event);" onfocus="return CKEDITOR.tools.callFunction(114,event);" onclick="CKEDITOR.tools.callFunction(115,this);return false;"><span class="cke_button_icon cke_button__blockquote_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -216px;background-size:auto;">&nbsp;</span><span id="cke_57_label" class="cke_button_label cke_button__blockquote_label" aria-hidden="false">Block Quote</span></a><a id="cke_58" class="cke_button cke_button__creatediv  cke_button_off" href="javascript:void('Create Div Container')" title="Create Div Container" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_58_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(116,event);" onfocus="return CKEDITOR.tools.callFunction(117,event);" onclick="CKEDITOR.tools.callFunction(118,this);return false;"><span class="cke_button_icon cke_button__creatediv_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -480px;background-size:auto;">&nbsp;</span><span id="cke_58_label" class="cke_button_label cke_button__creatediv_label" aria-hidden="false">Create Div Container</span></a><span class="cke_toolbar_separator" role="separator"></span><a id="cke_59" class="cke_button cke_button__justifyleft  cke_button_off" href="javascript:void('Align Left')" title="Align Left" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_59_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(119,event);" onfocus="return CKEDITOR.tools.callFunction(120,event);" onclick="CKEDITOR.tools.callFunction(121,this);return false;"><span class="cke_button_icon cke_button__justifyleft_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -1128px;background-size:auto;">&nbsp;</span><span id="cke_59_label" class="cke_button_label cke_button__justifyleft_label" aria-hidden="false">Align Left</span></a><a id="cke_60" class="cke_button cke_button__justifycenter  cke_button_off" href="javascript:void('Center')" title="Center" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_60_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(122,event);" onfocus="return CKEDITOR.tools.callFunction(123,event);" onclick="CKEDITOR.tools.callFunction(124,this);return false;"><span class="cke_button_icon cke_button__justifycenter_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -1104px;background-size:auto;">&nbsp;</span><span id="cke_60_label" class="cke_button_label cke_button__justifycenter_label" aria-hidden="false">Center</span></a><a id="cke_61" class="cke_button cke_button__justifyright  cke_button_off" href="javascript:void('Align Right')" title="Align Right" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_61_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(125,event);" onfocus="return CKEDITOR.tools.callFunction(126,event);" onclick="CKEDITOR.tools.callFunction(127,this);return false;"><span class="cke_button_icon cke_button__justifyright_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -1152px;background-size:auto;">&nbsp;</span><span id="cke_61_label" class="cke_button_label cke_button__justifyright_label" aria-hidden="false">Align Right</span></a><a id="cke_62" class="cke_button cke_button__justifyblock  cke_button_off" href="javascript:void('Justify')" title="Justify" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_62_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(128,event);" onfocus="return CKEDITOR.tools.callFunction(129,event);" onclick="CKEDITOR.tools.callFunction(130,this);return false;"><span class="cke_button_icon cke_button__justifyblock_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -1080px;background-size:auto;">&nbsp;</span><span id="cke_62_label" class="cke_button_label cke_button__justifyblock_label" aria-hidden="false">Justify</span></a><span class="cke_toolbar_separator" role="separator"></span><a id="cke_63" class="cke_button cke_button__bidiltr  cke_button_off" href="javascript:void('Text direction from left to right')" title="Text direction from left to right" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_63_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(131,event);" onfocus="return CKEDITOR.tools.callFunction(132,event);" onclick="CKEDITOR.tools.callFunction(133,this);return false;"><span class="cke_button_icon cke_button__bidiltr_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -168px;background-size:auto;">&nbsp;</span><span id="cke_63_label" class="cke_button_label cke_button__bidiltr_label" aria-hidden="false">Text direction from left to right</span></a><a id="cke_64" class="cke_button cke_button__bidirtl  cke_button_off" href="javascript:void('Text direction from right to left')" title="Text direction from right to left" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_64_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(134,event);" onfocus="return CKEDITOR.tools.callFunction(135,event);" onclick="CKEDITOR.tools.callFunction(136,this);return false;"><span class="cke_button_icon cke_button__bidirtl_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -192px;background-size:auto;">&nbsp;</span><span id="cke_64_label" class="cke_button_label cke_button__bidirtl_label" aria-hidden="false">Text direction from right to left</span></a><a id="cke_65" class="cke_button cke_button__language  cke_button_off" href="javascript:void('Set language')" title="Set language" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_65_label" aria-haspopup="true" onkeydown="return CKEDITOR.tools.callFunction(137,event);" onfocus="return CKEDITOR.tools.callFunction(138,event);" onclick="CKEDITOR.tools.callFunction(139,this);return false;"><span class="cke_button_icon cke_button__language_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -1176px;background-size:auto;">&nbsp;</span><span id="cke_65_label" class="cke_button_label cke_button__language_label" aria-hidden="false">Set language</span><span class="cke_button_arrow"></span></a></span><span class="cke_toolbar_end"></span></span><span id="cke_66" class="cke_toolbar" aria-labelledby="cke_66_label" role="toolbar"><span id="cke_66_label" class="cke_voice_label">Links</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><a id="cke_67" class="cke_button cke_button__link  cke_button_off" href="javascript:void('Link')" title="Link" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_67_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(140,event);" onfocus="return CKEDITOR.tools.callFunction(141,event);" onclick="CKEDITOR.tools.callFunction(142,this);return false;"><span class="cke_button_icon cke_button__link_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -1248px;background-size:auto;">&nbsp;</span><span id="cke_67_label" class="cke_button_label cke_button__link_label" aria-hidden="false">Link</span></a><a id="cke_68" class="cke_button cke_button__unlink cke_button_disabled " href="javascript:void('Unlink')" title="Unlink" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_68_label" aria-haspopup="false" aria-disabled="true" onkeydown="return CKEDITOR.tools.callFunction(143,event);" onfocus="return CKEDITOR.tools.callFunction(144,event);" onclick="CKEDITOR.tools.callFunction(145,this);return false;"><span class="cke_button_icon cke_button__unlink_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -1272px;background-size:auto;">&nbsp;</span><span id="cke_68_label" class="cke_button_label cke_button__unlink_label" aria-hidden="false">Unlink</span></a><a id="cke_69" class="cke_button cke_button__anchor  cke_button_off" href="javascript:void('Anchor')" title="Anchor" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_69_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(146,event);" onfocus="return CKEDITOR.tools.callFunction(147,event);" onclick="CKEDITOR.tools.callFunction(148,this);return false;"><span class="cke_button_icon cke_button__anchor_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -1224px;background-size:auto;">&nbsp;</span><span id="cke_69_label" class="cke_button_label cke_button__anchor_label" aria-hidden="false">Anchor</span></a></span><span class="cke_toolbar_end"></span></span><span id="cke_70" class="cke_toolbar" aria-labelledby="cke_70_label" role="toolbar"><span id="cke_70_label" class="cke_voice_label">Insert</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><a id="cke_71" class="cke_button cke_button__image  cke_button_off" href="javascript:void('Image')" title="Image" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_71_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(149,event);" onfocus="return CKEDITOR.tools.callFunction(150,event);" onclick="CKEDITOR.tools.callFunction(151,this);return false;"><span class="cke_button_icon cke_button__image_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -936px;background-size:auto;">&nbsp;</span><span id="cke_71_label" class="cke_button_label cke_button__image_label" aria-hidden="false">Image</span></a><a id="cke_72" class="cke_button cke_button__flash  cke_button_off" href="javascript:void('Flash')" title="Flash" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_72_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(152,event);" onfocus="return CKEDITOR.tools.callFunction(153,event);" onclick="CKEDITOR.tools.callFunction(154,this);return false;"><span class="cke_button_icon cke_button__flash_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -576px;background-size:auto;">&nbsp;</span><span id="cke_72_label" class="cke_button_label cke_button__flash_label" aria-hidden="false">Flash</span></a><a id="cke_73" class="cke_button cke_button__table  cke_button_off" href="javascript:void('Table')" title="Table" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_73_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(155,event);" onfocus="return CKEDITOR.tools.callFunction(156,event);" onclick="CKEDITOR.tools.callFunction(157,this);return false;"><span class="cke_button_icon cke_button__table_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -1896px;background-size:auto;">&nbsp;</span><span id="cke_73_label" class="cke_button_label cke_button__table_label" aria-hidden="false">Table</span></a><a id="cke_74" class="cke_button cke_button__horizontalrule  cke_button_off" href="javascript:void('Insert Horizontal Line')" title="Insert Horizontal Line" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_74_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(158,event);" onfocus="return CKEDITOR.tools.callFunction(159,event);" onclick="CKEDITOR.tools.callFunction(160,this);return false;"><span class="cke_button_icon cke_button__horizontalrule_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -888px;background-size:auto;">&nbsp;</span><span id="cke_74_label" class="cke_button_label cke_button__horizontalrule_label" aria-hidden="false">Insert Horizontal Line</span></a><a id="cke_75" class="cke_button cke_button__smiley  cke_button_off" href="javascript:void('Smiley')" title="Smiley" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_75_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(161,event);" onfocus="return CKEDITOR.tools.callFunction(162,event);" onclick="CKEDITOR.tools.callFunction(163,this);return false;"><span class="cke_button_icon cke_button__smiley_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -1056px;background-size:auto;">&nbsp;</span><span id="cke_75_label" class="cke_button_label cke_button__smiley_label" aria-hidden="false">Smiley</span></a><a id="cke_76" class="cke_button cke_button__specialchar  cke_button_off" href="javascript:void('Insert Special Character')" title="Insert Special Character" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_76_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(164,event);" onfocus="return CKEDITOR.tools.callFunction(165,event);" onclick="CKEDITOR.tools.callFunction(166,this);return false;"><span class="cke_button_icon cke_button__specialchar_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -1848px;background-size:auto;">&nbsp;</span><span id="cke_76_label" class="cke_button_label cke_button__specialchar_label" aria-hidden="false">Insert Special Character</span></a><a id="cke_77" class="cke_button cke_button__pagebreak  cke_button_off" href="javascript:void('Insert Page Break for Printing')" title="Insert Page Break for Printing" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_77_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(167,event);" onfocus="return CKEDITOR.tools.callFunction(168,event);" onclick="CKEDITOR.tools.callFunction(169,this);return false;"><span class="cke_button_icon cke_button__pagebreak_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -1488px;background-size:auto;">&nbsp;</span><span id="cke_77_label" class="cke_button_label cke_button__pagebreak_label" aria-hidden="false">Insert Page Break for Printing</span></a><a id="cke_78" class="cke_button cke_button__iframe  cke_button_off" href="javascript:void('IFrame')" title="IFrame" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_78_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(170,event);" onfocus="return CKEDITOR.tools.callFunction(171,event);" onclick="CKEDITOR.tools.callFunction(172,this);return false;"><span class="cke_button_icon cke_button__iframe_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -912px;background-size:auto;">&nbsp;</span><span id="cke_78_label" class="cke_button_label cke_button__iframe_label" aria-hidden="false">IFrame</span></a></span><span class="cke_toolbar_end"></span></span><span class="cke_toolbar_break"></span><span id="cke_79" class="cke_toolbar" aria-labelledby="cke_79_label" role="toolbar"><span id="cke_79_label" class="cke_voice_label">Styles</span><span class="cke_toolbar_start"></span><span id="cke_10" class="cke_combo cke_combo__styles  cke_combo_off" role="presentation"><span id="cke_10_label" class="cke_combo_label">Styles</span><a class="cke_combo_button" title="Formatting Styles" tabindex="-1" href="javascript:void('Formatting Styles')" hidefocus="true" role="button" aria-labelledby="cke_10_label" aria-haspopup="true" onkeydown="return CKEDITOR.tools.callFunction(174,event,this);" onfocus="return CKEDITOR.tools.callFunction(175,event);" onclick="CKEDITOR.tools.callFunction(173,this);return false;"><span id="cke_10_text" class="cke_combo_text cke_combo_inlinelabel">Styles</span><span class="cke_combo_open"><span class="cke_combo_arrow"></span></span></a></span><span id="cke_11" class="cke_combo cke_combo__format  cke_combo_off" role="presentation"><span id="cke_11_label" class="cke_combo_label">Format</span><a class="cke_combo_button" title="Paragraph Format" tabindex="-1" href="javascript:void('Paragraph Format')" hidefocus="true" role="button" aria-labelledby="cke_11_label" aria-haspopup="true" onkeydown="return CKEDITOR.tools.callFunction(177,event,this);" onfocus="return CKEDITOR.tools.callFunction(178,event);" onclick="CKEDITOR.tools.callFunction(176,this);return false;"><span id="cke_11_text" class="cke_combo_text cke_combo_inlinelabel">Format</span><span class="cke_combo_open"><span class="cke_combo_arrow"></span></span></a></span><span id="cke_12" class="cke_combo cke_combo__font  cke_combo_off" role="presentation"><span id="cke_12_label" class="cke_combo_label">Font</span><a class="cke_combo_button" title="Font Name" tabindex="-1" href="javascript:void('Font Name')" hidefocus="true" role="button" aria-labelledby="cke_12_label" aria-haspopup="true" onkeydown="return CKEDITOR.tools.callFunction(180,event,this);" onfocus="return CKEDITOR.tools.callFunction(181,event);" onclick="CKEDITOR.tools.callFunction(179,this);return false;"><span id="cke_12_text" class="cke_combo_text cke_combo_inlinelabel">Font</span><span class="cke_combo_open"><span class="cke_combo_arrow"></span></span></a></span><span id="cke_13" class="cke_combo cke_combo__fontsize  cke_combo_off" role="presentation"><span id="cke_13_label" class="cke_combo_label">Size</span><a class="cke_combo_button" title="Font Size" tabindex="-1" href="javascript:void('Font Size')" hidefocus="true" role="button" aria-labelledby="cke_13_label" aria-haspopup="true" onkeydown="return CKEDITOR.tools.callFunction(183,event,this);" onfocus="return CKEDITOR.tools.callFunction(184,event);" onclick="CKEDITOR.tools.callFunction(182,this);return false;"><span id="cke_13_text" class="cke_combo_text cke_combo_inlinelabel">Size</span><span class="cke_combo_open"><span class="cke_combo_arrow"></span></span></a></span><span class="cke_toolbar_end"></span></span><span id="cke_80" class="cke_toolbar" aria-labelledby="cke_80_label" role="toolbar"><span id="cke_80_label" class="cke_voice_label">Colors</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><a id="cke_81" class="cke_button cke_button__textcolor cke_button_off " href="javascript:void('Text Color')" title="Text Color" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_81_label" aria-haspopup="true" onkeydown="return CKEDITOR.tools.callFunction(185,event);" onfocus="return CKEDITOR.tools.callFunction(186,event);" onclick="CKEDITOR.tools.callFunction(187,this);return false;"><span class="cke_button_icon cke_button__textcolor_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -408px;background-size:auto;">&nbsp;</span><span id="cke_81_label" class="cke_button_label cke_button__textcolor_label" aria-hidden="false">Text Color</span><span class="cke_button_arrow"></span></a><a id="cke_82" class="cke_button cke_button__bgcolor cke_button_off " href="javascript:void('Background Color')" title="Background Color" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_82_label" aria-haspopup="true" onkeydown="return CKEDITOR.tools.callFunction(188,event);" onfocus="return CKEDITOR.tools.callFunction(189,event);" onclick="CKEDITOR.tools.callFunction(190,this);return false;"><span class="cke_button_icon cke_button__bgcolor_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -384px;background-size:auto;">&nbsp;</span><span id="cke_82_label" class="cke_button_label cke_button__bgcolor_label" aria-hidden="false">Background Color</span><span class="cke_button_arrow"></span></a></span><span class="cke_toolbar_end"></span></span><span id="cke_83" class="cke_toolbar" aria-labelledby="cke_83_label" role="toolbar"><span id="cke_83_label" class="cke_voice_label">Tools</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><a id="cke_84" class="cke_button cke_button__maximize  cke_button_off" href="javascript:void('Maximize')" title="Maximize" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_84_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(191,event);" onfocus="return CKEDITOR.tools.callFunction(192,event);" onclick="CKEDITOR.tools.callFunction(193,this);return false;"><span class="cke_button_icon cke_button__maximize_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -1392px;background-size:auto;">&nbsp;</span><span id="cke_84_label" class="cke_button_label cke_button__maximize_label" aria-hidden="false">Maximize</span></a><a id="cke_85" class="cke_button cke_button__showblocks  cke_button_off" href="javascript:void('Show Blocks')" title="Show Blocks" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_85_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(194,event);" onfocus="return CKEDITOR.tools.callFunction(195,event);" onclick="CKEDITOR.tools.callFunction(196,this);return false;"><span class="cke_button_icon cke_button__showblocks_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 -1776px;background-size:auto;">&nbsp;</span><span id="cke_85_label" class="cke_button_label cke_button__showblocks_label" aria-hidden="false">Show Blocks</span></a></span><span class="cke_toolbar_end"></span></span><span id="cke_86" class="cke_toolbar" aria-labelledby="cke_86_label" role="toolbar"><span id="cke_86_label" class="cke_voice_label">about</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><a id="cke_87" class="cke_button cke_button__about  cke_button_off" href="javascript:void('About CKEditor')" title="About CKEditor" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_87_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(197,event);" onfocus="return CKEDITOR.tools.callFunction(198,event);" onclick="CKEDITOR.tools.callFunction(199,this);return false;"><span class="cke_button_icon cke_button__about_icon" style="background-image:url(file:///home/ricardo/Documentos/Templates/HTML/FleshUI/freshuihtml-21/FreshUI%202.1%20by%20pixelcave/02%20-%20FreshUI%20Template%20(HTML)/js/ckeditor/plugins/icons.png?t=EAPE);background-position:0 0px;background-size:auto;">&nbsp;</span><span id="cke_87_label" class="cke_button_label cke_button__about_label" aria-hidden="false">About CKEditor</span></a></span><span class="cke_toolbar_end"></span></span></span></span><div id="cke_1_contents" class="cke_contents cke_reset" role="presentation" style="height: 200px;"><span id="cke_92" class="cke_voice_label">Press ALT 0 for help</span><iframe src="" frameborder="0" class="cke_wysiwyg_frame cke_reset" style="width: 856px; height: 100%;" title="Rich Text Editor, textarea-ckeditor" aria-describedby="cke_92" tabindex="0" allowtransparency="true"></iframe></div><span id="cke_1_bottom" class="cke_bottom cke_reset_all" role="presentation" style="user-select: none;"><span id="cke_1_resizer" class="cke_resizer cke_resizer_vertical cke_resizer_ltr" title="Resize" onmousedown="CKEDITOR.tools.callFunction(0, event)">◢</span><span id="cke_1_path_label" class="cke_voice_label">Elements path</span><span id="cke_1_path" class="cke_path" role="group" aria-labelledby="cke_1_path_label"><span class="cke_path_empty">&nbsp;</span></span></span></div></div>
                    <div class="help-block"><code>.ckeditor</code></div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="elastic-textarea">Elastic</label>
                <div class="col-md-3">
                    <textarea id="elastic-textarea" name="elastic-textarea" rows="2" class="form-control textarea-elastic" style="overflow: hidden; height: 50px;">Just add a class and the textarea will auto expand as you write..</textarea>
                    <div class="help-block"><code>.textarea-elastic</code></div>
                <div style="position: absolute; display: none; overflow-wrap: break-word; white-space: pre-wrap; border-color: rgb(217, 217, 217); border-style: solid; border-width: 1px; font-weight: 400; width: 844px; font-family: &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 18.5714px; font-size: 13px; padding: 6px 8px;">Just add a class and the textarea will auto expand as you write..&nbsp;</div></div>
            </div>
        </form>
        <!-- END Textareas and Editor Content -->
    </div>
    <!-- END Textareas and Editor Block -->
</div> --}}

@endsection

