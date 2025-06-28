<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:output method="html" encoding="UTF-8"/>
  
  <xsl:template match="/">
    <html>
      <head>
        <title>Emploi du temps</title>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"/>
      </head>
      <body class="p-8 bg-gray-50 font-sans">
      
        <div class="w-full mx-auto bg-white p-8 rounded shadow border border-gray-200">
          
          <h2 class="text-3xl font-bold text-blue-700 mb-8 border-b pb-4 flex items-center gap-3">
            <i class="fi fi-rr-calendar text-blue-500 text-4xl"></i>
            Planning des Séances
          </h2>
          
          <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-gray-700">
              <thead class="bg-blue-50 uppercase text-xs font-semibold text-blue-700">
                <tr>
                  <th class="px-4 py-3 text-left">Jour</th>
                  <th class="px-4 py-3 text-left">Début</th>
                  <th class="px-4 py-3 text-left">Fin</th>
                  <th class="px-4 py-3 text-left">Professeur</th>
                  <th class="px-4 py-3 text-left">Module</th>
                  <th class="px-4 py-3 text-left">Salle</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-100">
                
                <xsl:for-each select="emploi/seance">
                  <xsl:variable name="prof" select="@prof"/>
                  <xsl:variable name="colorIndex" select="string-length(translate($prof, 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', '')) mod 5"/>
                  <xsl:variable name="textColor">
                    <xsl:choose>
                      <xsl:when test="$colorIndex = 0">text-red-500</xsl:when>
                      <xsl:when test="$colorIndex = 1">text-green-500</xsl:when>
                      <xsl:when test="$colorIndex = 2">text-amber-500</xsl:when>
                      <xsl:when test="$colorIndex = 3">text-purple-500</xsl:when>
                      <xsl:otherwise>text-blue-500</xsl:otherwise>
                    </xsl:choose>
                  </xsl:variable>
                  
                  <tr class="hover:bg-blue-50 transition duration-300">
                    <td class="px-4 py-3 whitespace-nowrap">
                      <span class="text-gray-800 font-medium">
                        <xsl:value-of select="@jour"/>
                      </span>
                    </td>
                    <td class="px-4 py-3 text-blue-600 font-semibold">
                      <xsl:value-of select="@debut"/>
                    </td>
                    <td class="px-4 py-3 text-blue-600 font-semibold">
                      <xsl:value-of select="@fin"/>
                    </td>
                    <td class="px-4 py-3">
                      <span class="{$textColor} font-semibold">
                        <xsl:value-of select="@prof"/>
                      </span>
                    </td>
                    <td class="px-4 py-3">
                      <span class="text-gray-700">
                        <xsl:value-of select="@module"/>
                      </span>
                    </td>
                    <td class="px-4 py-3">
                      <span class="text-gray-700">
                        <xsl:value-of select="@salle"/>
                      </span>
                    </td>
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