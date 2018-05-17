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
                <!-- Tính phí vận chuyển -->

                <xsl:for-each select="//book">
                    <h3>
                        <xsl:value-of select="title" /> <br />
                        <xsl:value-of select="weight" /> <xsl:value-of select="weight/@units" /><br />
                    </h3>
                    US: <xsl:value-of select="(weight div 100) * (shipping/US)" /> <br />
                    EU: <xsl:value-of select="(weight div 100) * (shipping/EU)" /> <br />
                    VN: <xsl:value-of select="(weight div 100) * (shipping/VN)" /> <br />
                    <hr />
                </xsl:for-each>
            </div>
        </body>
        </html>
    </xsl:template>
</xsl:stylesheet>