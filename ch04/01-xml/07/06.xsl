<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/book_store">
        <html>
            <head>
                <title>XSL Tutorial</title>
            </head>
        <body>
            <h2>Khóa học lập trình PHP - ZendVN</h2>
            <h3>Nhúng nội dung xsl vào xml</h3>

            <xsl:for-each select="book">
                <xsl:sort select="pages" order="descending" data-type="number" />
                <ul>
                    <li>Tên khóa học: <xsl:value-of select="title" /></li>                
                    <li>Tác giả: <xsl:value-of select="author" /></li>                
                    <li>Số trang: <xsl:value-of select="pages" /></li>
                    <xsl:if test="weight &gt; 600">
                        <li>
                            Trọng Lượng: <xsl:value-of select="weight" /><xsl:value-of select="weight/@units" /> 
                        </li>     
                    </xsl:if>    
                    <li>
                        Chú ý:
                        <xsl:choose>
                            <xsl:when test="weight/@units = 'gram'">Vận chuyển miễn phí</xsl:when>
                            <xsl:otherwise>Vận chuyển có phí</xsl:otherwise>
                        </xsl:choose>
                    </li>       
                </ul>
                <hr />
            </xsl:for-each>
        </body>
        </html>
    </xsl:template>
</xsl:stylesheet>