<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/book">
        <html>
            <head>
                <title>XSL Tutorial</title>
            </head>
        <body>
            <h2>Khóa học lập trình PHP - ZendVN</h2>
            <h3>Nhúng nội dung xsl vào xml</h3>
            <ul>
                <li>Tên khóa học: <xsl:value-of select="title" /></li>                
                <li>Tác giả: <xsl:value-of select="author" /></li>                
                <li>Số trang: <xsl:value-of select="pages" /></li>
                <xsl:if test="weight &gt; 500">
                    <li>
                        Trọng Lượng: <xsl:value-of select="weight" /><xsl:value-of select="weight/@units" /> 
                    </li>     
                </xsl:if>           
            </ul>
        </body>
        </html>
    </xsl:template>
</xsl:stylesheet>