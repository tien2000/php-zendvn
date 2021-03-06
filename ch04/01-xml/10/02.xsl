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
                <!-- Lấy những quyển sách có khuyến mãi -->

                <xsl:for-each select="//book[price/real  &gt; price/sale-off]">
                    <xsl:value-of select="title" /> <br />
                </xsl:for-each>

                
            </div>
        </body>
        </html>
    </xsl:template>
</xsl:stylesheet>