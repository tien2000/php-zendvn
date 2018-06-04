-- 01. Hiển thị thông tin bảng Architect.
SELECT * FROM architect;

-- 02. Hiển thị danh sách tên, giới tính của kiến trúc sư
SELECT name, sex FROM architect;

-- 03. Hiển thị những năm sinh của kiến trúc sư
SELECT DISTINCT birthday FROM architect;

-- 04. Hiển thị danh sách kiến trúc sư (họ tên, năm sinh (tăng dần))
