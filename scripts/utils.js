// <!-- 1900187 -->
$(document).ready(function() {
    $('#edit').click(function() {
        $('.show-form').show();
        $('.your-review').hide();
        let title = document.getElementById('review_title').innerHTML;
        let review = document.getElementById('review_review').innerHTML;
        let rating = document.getElementById('review_rating').innerHTML;
        fillForm($('.show-form'), title, review, rating);
    });
    $('#cancel').click(function() {
        $('.show-form').hide();
        $('.your-review').show();
    });
});

function fillForm($form, title, review, rating){
    $form.find('#is_edit').val(true);
    $form.find('#form_title').val(title);
    $form.find('#form_review').val(review);
    $form.find('#form_rating').val(rating);
}

function resetForm($form) {
    $('.show-form').show();
    $form.find('input:text, input:password, textarea').val('');
}