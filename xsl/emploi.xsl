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
      <div class="p-4 bg-white rounded shadow border border-gray-200">
        <h2 class="text-xl font-bold text-gray-800 mb-4 border-b pb-2">Planning des Séances</h2>
        
        <div class="overflow-x-auto">
          <table class="min-w-full table-auto border-collapse text-sm">
            <thead class="bg-blue-100 text-gray-700 uppercase text-xs">
              <tr>
                <th class="px-4 py-2 border-b text-left">Jour</th>
                <th class="px-4 py-2 border-b text-left">Début</th>
                <th class="px-4 py-2 border-b text-left">Fin</th>
                <th class="px-4 py-2 border-b text-left">Professeur</th>
                <th class="px-4 py-2 border-b text-left">Module</th>
                <th class="px-4 py-2 border-b text-left">Salle</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
              <xsl:for-each select="emploi/seance">
                <xsl:variable name="prof" select="@prof"/>
                <xsl:variable name="colorIndex" select="string-length(translate($prof, 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', '')) mod 5"/>
                <xsl:variable name="textColor">
                  <xsl:choose>
                    <xsl:when test="$colorIndex = 0">text-red-500</xsl:when>
                    <xsl:when test="$colorIndex = 1">text-green-500</xsl:when>
                    <xsl:when test="$colorIndex = 2">text-yellow-500</xsl:when>
                    <xsl:when test="$colorIndex = 3">text-purple-500</xsl:when>
                    <xsl:otherwise>text-pink-500</xsl:otherwise>
                  </xsl:choose>
                </xsl:variable>

                <tr class="hover:bg-blue-50 transition duration-200">
                  <td class="px-4 py-2"><xsl:value-of select="@jour"/></td>
                  <td class="px-4 py-2 text-blue-500 font-semibold"><xsl:value-of select="@debut"/></td>
                  <td class="px-4 py-2 text-blue-500 font-semibold"><xsl:value-of select="@fin"/></td>
                  <td class="px-4 py-2 font-medium">
                    <span class="{$textColor}">
                      <xsl:value-of select="@prof"/>
                    </span>
                  </td>
                  <td class="px-4 py-2"><xsl:value-of select="@module"/></td>
                  <td class="px-4 py-2"><xsl:value-of select="@salle"/></td>
                </tr>
              </xsl:for-each>
            </tbody>
          </table>
        </div>
      </div>
      </body>
    </html>
  </xsl:template>
</xsl:stylesheet>