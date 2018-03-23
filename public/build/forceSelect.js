/**
 * Created by cuongpm on 12/22/17.
 */
(function ($) {
    $.fn.magicSelect = function (config) {
        var url = config.route;
        var name = config.name;
        var isSelected = config.isSelect;
        var self = this;
        var data = {};
        self.change(function () {
            data[name] = self.val();
            $.ajax({
                url: url,
                data: data,
                method: "GET",
                success: function (data) {
                    var option = optionCate(data);
                    $(isSelected).html(option);
                },
                error: function (err) {
                    alert('error')
                }
            });
            function optionCate(data) {
                var option = '<option value="">Select option</option>';
                Object.keys(data).forEach(function (key) {
                    option += '<option value="' + key + '">' + data[key] + '</option>';
                });
                return option;
            }
        });
        return this;
    };
}($));

/*
var routeCategoryList = $('#routeCategoryList');
var domainSelect = $('#domain_id');
var categorySelect = $('#test_category_id');
var config = {
    route: routeCategoryList,
    isSelect: categorySelect
};
domainSelect.magicSelect(config);*/
