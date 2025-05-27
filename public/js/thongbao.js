document.addEventListener('DOMContentLoaded', function () {
    // Lấy thông tin từ thẻ meta
    const swalSuccessMeta = document.querySelector('meta[name="swal-success"]');
    const swalErrorMeta = document.querySelector('meta[name="swal-error"]');

    if (swalSuccessMeta) {
        const data = JSON.parse(swalSuccessMeta.getAttribute('content'));
        Swal.fire({
            title: data.title,
            text: data.text,
            icon: data.icon,
            timer: 3000,
            showConfirmButton: false
        });
    }
    if (swalErrorMeta) {
        const data = JSON.parse(swalErrorMeta.getAttribute('content'));
        Swal.fire({
            title: data.title,
            text: data.text,
            icon: data.icon,
            timer: 3000,
            showConfirmButton: false
        });
    }
});