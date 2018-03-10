/**
 * Created by vincent on 5/24/17.
 */
var permission_id;
var formroleCompose = $('#formroleCompose');
var listRole = $('input[name="role[]"]');

formroleCompose.submit(function (e) {
    e.preventDefault();
    $.ajax({
        url: formroleCompose.attr('action'),
        method: 'POST',
        data: {role_ids: getChecked($('input[name="role[]"]:checked')), id: permission_id},
        success: function (data) {
            alert(data)
        },
        error: function (err) {
            alert('err')
        }
    })
});

function getRoles(id, url) {
    permission_id = id;
    $.ajax({
        url: url,
        method: 'GET',
        data: {id: id},
        success: function (data) {
            listRole.each(function () {
                var self = $(this);
                resetChecked(self);
                setChecked(data, self);
            }).get();
        },
        error: function () {
            alert('err');
        }
    });
}

function resetChecked(self) {
    self.prop('checked', false);
    self.parent().parent().removeClass('checked');
}

function setChecked(data, self) {
    if (data.indexOf(parseInt(self.val())) >= 0) {
        self.prop('checked', true);
        self.parent().parent().addClass('checked');
    }
}