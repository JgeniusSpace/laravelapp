var MenuList = function() {
    var menuInit = function(){
        // Select2
        var _select2 = $(".select2_single").select2({
            placeholder: "Select a state",
            allowClear: true
        });

        // nestable
        $('#nestable_list_3').nestable({
            "maxDepth":2
        });

        $(document).on('click','.createMenu',function () {
            var _item = $(this);
            _select2.val(_item.attr('data-pid')).trigger("change");
        });

        // 修改菜单按钮事件
        $(document).on('click','.editMenu',function () {
            var _url = $(this).attr('data-href');
            $.ajax({
                url:_url,
                dataType:'json',
                beforeSend:function() {
                    // loading
                    //layer.load(1);
                },
                success:function(menu) {
                    // 关闭loading
                    //layer.closeAll('loading');
                    if (menu.status) {
                        menuFun.initAttribute(menu,select2);
                    }
                    //layer.msg(menu.msg);
                }
            });
        });

        var menuFun = function() {
            var menuAttribute = function(menu,select2) {
                $('input[name=name]').val(menu.name);
                select2.val(menu.parent_id).trigger("change");
                $('input[name=icon]').val(menu.icon);
                $('input[name=url]').val(menu.url);
                $('input[name=heightlight_url] ').val(menu.heightlight_url);
                $('input[name=sort]').val(menu.sort);
                $('#menuForm').attr('action',menu.update);
                $('#menuForm').append('<input type="hidden" name="_method" value="PATCH">');
                $('#menuForm').append('<input type="hidden" name="id" value="'+menu.id+'">');
            };
            return {
                initAttribute : menuAttribute
            }
        }();

    };
    return {
        init : menuInit
    }
}();