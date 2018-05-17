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
                <!-- <xsl:value-of select="book_store/book[last() - 1]/title" /><br />
                    <xsl:value-of select="book_store/book[@id = 22]" /> <br />
                 -->

                <xsl:for-each select="book_store/book[@id]/title | book_store/book[@id]/pages">
                    <xsl:value-of select="." /> <br />
                </xsl:for-each>

                
            </div>
        </body>
        </html>
    </xsl:template>
</xsl:stylesheet>