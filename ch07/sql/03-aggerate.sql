-- Aggregate Functions COUNT, MAX, MIN, SUM, AVG

SELECT * FROM architect;

-- 01. Thống kê tổng số KTS
SELECT COUNT(id) as tong FROM architect;

-- 02. Thống kê tổng số KTS nam
SELECT COUNT(id) as tong_nam FROM architect WHERE sex = 1;

-- Thống kê tổng sồ KTS nữ
SELECT COUNT(id) as tong_nu FROM architect WHERE sex = 0;

-- 03. Tìm ngày tham gia công trình nhiều nhất của công nhân
SELECT MAX(total) as max FROM work;

-- 04. Tìm ngày tham gia công trình ít nhất của công nhân
SELECT MIN(total) as min FROM work;

-- 05. Tìm tổng số ngày tham gia công trình của tất cả công nhân
SELECT SUM(total) as sum FROM work;

-- 06. Tìm tổng chi phí phải trả cho việc thiết kế công trình của KTS có Mã số 1
SELECT SUM(benefit) as thu_lao FROM design WHERE architect_id = 1;

-- 07. Tìm trung bình số ngày tham gia công trình của công nhân
SELECT AVG(total) as avg FROM work;

SELECT MAX(total) as max, MIN(total) as min, SUM(total) as sum, AVG(total) as avg FROM work;

-- 08. Hiển thị thông tin họ tên, tuổi KTS
SELECT name, (2013 - birthday) AS age FROM architect;

-- 09. Tính thù lao của KTS : Thù lao = benefit * 1000
SELECT architect_id, building_id, (design.benefit * 1000) AS cost FROM design;










