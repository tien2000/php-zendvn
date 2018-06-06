-- 01. Ký hiệu ^ : tìm từ đầu chuỗi nguồn 
SELECT 'MySQL is easy' REGEXP '^Mya';


-- 02. Ký hiệu $ : tìm từ cuối chuỗi nguồn
SELECT 'MySQL is easy 1' REGEXP 'easy$';


-- 03. Ký hiệu . : đại diện một ký tự bất kỳ 
SELECT 'MySQL' REGEXP '^M.SQL$' AS result;

-- 04. Ký hiệu * : ký tự xuất hiện 0 hoặc nhiều lần 
SELECT 'MyyyySQL' REGEXP '^M.*SQL$' AS result;  -- MSQL
SELECT 'MyyyySQL' REGEXP '^M....SQL$' AS result;


-- 05. Ký hiệu + : ký tự xuất hiện 1 hoặc nhiều lần 
SELECT 'MyyyySQL' REGEXP '^M.+SQL$' AS result;  -- M.SQL M..SQL


-- 06. Ký hiệu ? : ký tự xuất hiện 0 hoặc 1 lần 
SELECT 'MyyyySQL' REGEXP '^M.?SQL$' AS result;  -- MSQL M.SQL


-- 07. Ký hiệu | : sự lựa chọn (hoặc)
SELECT 'Mi' REGEXP '^(My|Mi)$' AS result;


-- 08. {n.m} Số lần xuất hiện của ký tự (a* tương đương a{0}; a+ tương đương a{1}; a? tương đương a{0,1})
SELECT 'abcdebcde' REGEXP 'a(bcd){1,5}e' AS result;


