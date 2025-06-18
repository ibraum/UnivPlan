<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:output method="html" encoding="UTF-8"/>
  <xsl:template match="/">
    <html>
      <head>
        <title>Emploi du temps</title>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"/>
      </head>
      <body class="p-4">
        <div class="rounded p-2 border"> 
            <table class="table-auto w-full border">
            <thead class="bg-gray-100">
                <tr>
                <th>Jour</th>
                <th>Début</th>
                <th>Fin</th>
                <th>Prof</th>
                <th>Module</th>
                <th>Salle</th>
                </tr>
            </thead>
            <tbody>
                <xsl:for-each select="emploi/seance">
                <tr class="border-t">
                    <td><xsl:value-of select="@jour"/></td>
                    <td><xsl:value-of select="@debut"/></td>
                    <td><xsl:value-of select="@fin"/></td>
                    <td><xsl:value-of select="@prof"/></td>
                    <td><xsl:value-of select="@module"/></td>
                    <td><xsl:value-of select="@salle"/></td>
                </tr>
                </xsl:for-each>
            </tbody>
            </table>
        </div>
      </body>
    </html>
  </xsl:template>
</xsl:stylesheet>
