<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/">
        <html>
            <head>
                <title>XSL Tutorial</title>
            </head>
        <body>
            <h2>Khóa học lập trình PHP - ZendVN</h2>
            <h3>Nhúng nội dung xsl vào xml</h3>
            <div>
                <!-- Tính số tiền được giảm giá -->
                <h3>
                    Số cuốn sách: <xsl:value-of select="count(//book)" /> <br />
                    Tổng số tiền: <xsl:value-of select="sum(//book/price/sale-off)" />
                </h3>
            </div>
        </body>
        </html>
    </xsl:template>
</xsl:stylesheet>