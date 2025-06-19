<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:output method="html" encoding="UTF-8"/>

  <xsl:key name="jourIndex" match="seance" use="@jour" />
  <xsl:template match="/">

    <html lang="fr">
      <head>
        <meta charset="UTF-8"/>
        <title>Planning hebdomadaire</title>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"/>
      </head>
      <body class="bg-gray-100 p-6">
        <div class="max-w-full mx-auto bg-white rounded shadow p-4">
          <h1 class="text-2xl font-bold text-blue-600 mb-4">Planning hebdomadaire</h1>

          <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-300 text-sm text-gray-700">
              <thead>
                <tr class="bg-blue-100 text-blue-800 font-semibold">
                  <th class="border px-4 py-2">Heure</th>
                  <th class="border px-4 py-2">Lundi</th>
                  <th class="border px-4 py-2">Mardi</th>
                  <th class="border px-4 py-2">Mercredi</th>
                  <th class="border px-4 py-2">Jeudi</th>
                  <th class="border px-4 py-2">Vendredi</th>
                  <th class="border px-4 py-2">Samedi</th>
                </tr>
              </thead>
              <tbody>
                <xsl:for-each select="document('')">
                  <xsl:variable name="heures" select="('08:00','10:00','12:00','14:00','16:00','18:00')" />
                  <xsl:for-each select="$heures">
                    <tr>
                      <td class="border px-2 py-1 font-medium bg-gray-50"><xsl:value-of select="."/></td>

                      <!-- Pour chaque jour -->
                      <xsl:for-each select="('Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi')">
                        <td class="border px-2 py-1 h-[80px] align-top">
                          <xsl:for-each select="/emploi/seance[@jour=current()][@debut=current()/..]">
                            <div class="bg-blue-200 text-blue-800 rounded p-1 mb-1">
                              <div class="font-semibold"><xsl:value-of select="@module"/></div>
                              <div class="text-xs"><xsl:value-of select="@prof"/> – <xsl:value-of select="@salle"/></div>
                              <div class="text-xs italic">(<xsl:value-of select="@debut"/> à <xsl:value-of select="@fin"/>)</div>
                            </div>
                          </xsl:for-each>
                        </td>
                      </xsl:for-each>
                    </tr>
                  </xsl:for-each>
                </xsl:for-each>
              </tbody>
            </table>
          </div>
        </div>
      </body>
    </html>
  </xsl:template>
</xsl:stylesheet>
