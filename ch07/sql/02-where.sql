-- 07. Hiển thị thông tin của KTS 'le thanh tung'
SELECT * FROM architect
WHERE name= 'le thanh tung';

-- 08. Hiển thị tên, năm sinh của các công nhân có chuyên ngành hàn hoặc điện
SELECT name, birthday, skill FROM worker
WHERE skill = 'han' OR skill = 'dien';

-- 09. Hiển thị tên, năm sinh của các công nhân có chuyên ngành hàn hoặc điện và năm sinh lớn hơn 1948
SELECT name, birthday, skill FROM worker
WHERE (skill = 'han' OR skill = 'dien') AND birthday > 1948;

-- 10. Hiển thị công nhân vào nghề khi dưới 20 tuổi.
SELECT * FROM worker
WHERE birthday + 20 > year;

-- 11. Hiển thị những công nhân có năm sinh 1940, 1945, 1948
-- C1
SELECT * FROM worker
WHERE birthday = 1940 OR birthday = 1945 OR birthday = 1948;
-- C2
SELECT * FROM worker
WHERE birthday NOT IN (1940, 1945, 1948);

-- 12. Hiển thị những công trình từ 200 - 500 triệu
-- C1
SELECT * FROM building
WHERE cost >= 200 AND cost <= 500;
-- C2
SELECT * FROM building
WHERE cost BETWEEN 200 AND 500;

-- 13. Hiển thị KTS có họ 'Nguyen'
SELECT * FROM architect
WHERE name LIKE '%nguyen%';

-- 14. Hiển thị KTS có họ lot 'Anh'
SELECT * FROM architect
WHERE name LIKE '%anh%';

-- 15. Hiển thị KTS có tên bắt đầu là 'th' và có 3 ký tự
SELECT * FROM architect
WHERE name LIKE '%th_';

-- 16. Hiển thị chủ thầu ko có phone
SELECT * FROM contractor
WHERE phone IS NOT NULL;









