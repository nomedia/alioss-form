<div class="{{$viewClass['form-group']}} {!! !$errors->has($errorKey) ? '' : 'has-error' !!}">
    <label for="{{$id}}" class="{{$viewClass['label']}} control-label">{{$label}}</label>
    <div class="{{$viewClass['field']}}">
        @include('admin::form.error')
        <?php $oss_url = config('alioss')['OSS_URL'];?>
        @if(old($column, $value))
            <div class="upload_add_btn Js_upload_warp id old">


               {{-- {{dump(pathinfo(old($column, $value), PATHINFO_EXTENSION))}}

                {{dump(old($column, $value))}}--}}



                @if(pathinfo(old($column, $value), PATHINFO_EXTENSION)=="epub")
                    <img data-filename="{{old($column, $value)}}"
                         src="/images/epub.jpg">
                    @elseif(pathinfo(old($column, $value), PATHINFO_EXTENSION)=="mp4")
                    <img onclick="window.open('{{$oss_url}}/{{old($column, $value)}}','_blank')" data-filename="{{old($column, $value)}}"
                         src="/images/mp4.jpg">
                {{--       <video   height="30px" src="{{$oss_url}}/{{old($column, $value)}}" controls>
                        </video>--}}

                    @else



                    <img data-filename="{{old($column, $value)}}"
                         src="{{$oss_url}}/{{old($column, $value)}}?x-oss-process=image/resize,m_fill,w_100,h_100">
                @endif


                <div class="upload_model" onclick="del_pic(this,false)">删除</div>
                <div class="upload_add_img" id="{{$column}}_upload"
                     style="position: relative; z-index: 1; display: none;">+
                </div>
                <input type="hidden" class="Js_upload_input" name="{{$column}}" value="{{old($column, $value)}}">
            </div>
        @else
            <div class="upload_add_btn Js_upload_warp">
                <div class="upload_model" onclick="del_pic(this,false)">删除</div>
                <div class="upload_add_img" id="{{$column}}_upload">+</div>
                <input type="hidden" class="Js_upload_input" name="{{$column}}" value="">
            </div>
        @endif
        @include('admin::form.help-block')
    </div>
</div>
