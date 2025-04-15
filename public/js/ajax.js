function loadSanpham(page, loai, containerSelector, paginationSelector) {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", `testbanhsinhnhat.php&page=${page}&loai=${loai}`, true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            const response = JSON.parse(xhr.responseText);
            document.querySelector(containerSelector).innerHTML = response.html; // Cập nhật danh sách sản phẩm
            document.querySelector(paginationSelector).innerHTML = response.pagination; // Cập nhật phân trang
        }
    };
    xhr.send();
}
