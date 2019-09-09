<script type="text/javascript">
    var public_lang = "{{ trans('backLang.calendarLanguage') }}"; // this is a public var used in app.html.js to define path to js files
    var public_folder_path = "{{ URL::to('') }}"; // this is a public var used in app.html.js to define path to js files
</script>
<script src="{{ URL::to('backEnd/scripts/app.html.js') }}"></script>
<script src="{{ URL::to('backEnd/scripts/jscolor.js') }}"></script>
{!! \App\Helpers\Helper::SaveVisitorInfo("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]") !!}


<script type="text/javascript">
    $(document).ready(function () {
        // $( ".copy" ).hide();
        // $( "#section_id2" ).show();

        $(".add-more").click(function (e) {
            $(".copy").append("<div class='tes1'>"+"<div class='form-group row'>" +"<label class='col-sm-2 form-control-label'>"
                +"{{ trans('backLang.specialprice') }}"+"</label>"+"<div class='col-sm-10'>"+
                "<input type='text' name='spcialprice[]' class='form-control'placeholder='{{ trans('backLang.specialprice') }}' >" +
                "</div>" + "</div>" +"<div class='form-group row'>" +"<label class='col-sm-2 form-control-label'>"
                +"{{ trans('backLang.price') }}"+"</label>"+"<div class='col-sm-10'>"+
                "<input type='text' name='price[]' class='form-control'placeholder='{{ trans('backLang.price') }}' >" +
                "</div>" + "</div>" + "<div class='form-group row'>" +"<label class='col-sm-2 form-control-label'>"
                +"{{ trans('backLang.specialpricedate') }}"+"</label>"+"<div class='col-sm-10'>"+"<div class='form-group'>"+
                    "<div class='input-group date' ui-jp='datetimepicker' ui-options='{ format: YYYY-MM-DD,icons : {time : fa fa-clock-o ,date: fa fa-calendar ,up: fa fa-chevron-up,down: fa fa-chevron-down,previous: fa fa-chevron-left, next: fa fa-chevron-right,today: fa fa-screenshot,clear: fa fa-trash,close: fa fa-remove}'>"+
                "<input type='date' name='date_end_price[]' class='form-control has-value'placeholder='{{ trans('backLang.specialpricedate') }}' >" +
                "<span class='input-group-addon'>" +
                "<span class='fa fa-calendar'></span>" +
                "</span>"+
                "</div>" + "</div>" + "</div>" + "</div>" + "<div class='form-group row'>" +"<label class='col-sm-2 form-control-label'>"
            +"{{ trans('backLang.size') }}"+"</label>"+
                "<div class='col-sm-10'>"+
                "<select  name='standard_gold[]' class='form-control c-select' >" +
                "<option>" + '{{ trans('backLang.select_Standard_gold') }}' + "</option>" +
                    @foreach(\App\Topic::where('webmaster_id',15)->get()  as $type )
                            @if(App::getLocale()  == 'en')
                        "<option value='{{$type->id}}'>" + '{{$type->title_en}}' + "</option>" +
                    @else
                        "<option value='{{$type->id}}'>" + '{{$type->title_il}}' + "</option>" +
                    @endif
                            @endforeach
                        "</select>" +
                "</div>" +
                "</div>" +
                "<div class='form-group row'>" +"<label class='col-sm-2 form-control-label'>"
                +"{{ trans('backLang.select_Standard_gold') }}"+"</label>"+
                "<div class='col-sm-10'>"+
                "<select  name='size_id[]' class='form-control c-select' >" +
                "<option value=''>" + '{{ trans('backLang.selectsize') }}' + "</option>" +
                    @foreach(\App\Topic::where('webmaster_id',18)->get()  as $type )
                            @if(App::getLocale()  == 'en')
                        "<option value='{{$type->id}}'>" + '{{$type->size}}' + "</option>" +
                    @else
                        "<option value='{{$type->id}}'>" + '{{$type->size}}' + "</option>" +
                    @endif
                            @endforeach
                        "</select>" +
                "</div>"+
            "</div>"
                + "<div class='input-group-btn'>" +
                "<button  class='btn btn-danger remove_div'  type='button' >" + "<i class='glyphicon glyphicon-remove'>" + "</i>" +
                "{{ trans('backLang.Remove') }}" + "</button>" +
                "</div>"+"</div>"
                + ""
            );
            // $(this).next().append( input );
        });

        $('.copy').on("click",".remove_div", function(e){
            e.preventDefault();
            $(this).parents("div .tes1").remove();
        })

            $("select[name='type_id']").change(function () {
            var type_id = $(this).val();
            // alert(type_id);
            $.ajax({
                url: '{{url("get/cate")}}' + '/' + type_id,
                method: 'get',
                success: function (data) {
                    console.log(data);
                    $("select[name='section_id'").html('');
                    $("select[name='section_id'").html(data.options);

                }
            });
        });

        $("select[name='section_id']").change(function () {
            var sub_id = $(this).val();
            //  alert(sub_id);
            $.ajax({
                url: '{{url("get/subcate")}}' + '/' + sub_id,
                method: 'get',
                success: function (data) {
                    console.log(data);
                    $("select[name='subcate_id'").html('');
                    $("select[name='subcate_id'").html(data.options);

                }
            });
        });

        $("select[name='subcate_id']").change(function () {
            var pro_id = $(this).val();
            //  alert(pro_id);
            $.ajax({
                url: '{{url("get/product")}}' + '/' + pro_id,
                method: 'get',
                success: function (data) {
                    console.log(data);
                    $("select[name='product_id'").html('');
                    $("select[name='product_id'").html(data.options);

                }
            });
        });


    });
</script>
