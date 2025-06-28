<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
  
  <xsl:output method="html" encoding="UTF-8" indent="yes" />
  
  <xsl:template match="/classe">
    <html>
      <head>
        <title>Classe - <xsl:value-of select="@filiere" /></title>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
        <link href="https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css" rel="stylesheet" />
      </head>
      <body class="min-h-screen bg-gradient-to-br from-blue-50 via-blue-50 to-blue-50 text-gray-800 font-sans">

        <div class="w-full mx-auto">
          
          <header class="mb-12">
            <h1 class="text-4xl font-extrabold text-gray-800 tracking-tight">
              Filière :
              <span class="text-blue-500"><xsl:value-of select="@filiere" /></span>
              –
              Niveau :
              <span class="text-blue-600"><xsl:value-of select="@niveau" /></span>
            </h1>
          </header>

          <!-- Étudiants -->
          <section class="mb-10">
            <h2 class="text-2xl font-bold text-blue-700 mb-6 flex items-center">
              <i class="fi fi-rr-users mr-3 text-blue-500 text-2xl"></i>
              Étudiants
            </h2>
            
            <div class="overflow-x-auto rounded shadow border border-slate-100">
              <table class="min-w-full divide-y divide-gray-200 bg-white">
                <thead class="bg-gradient-to-r from-blue-200 to-blue-200">
                  <tr>
                    <th class="px-6 py-3 text-left text-xs font-bold uppercase text-gray-700">Numéro</th>
                    <th class="px-6 py-3 text-left text-xs font-bold uppercase text-gray-700">Nom</th>
                    <th class="px-6 py-3 text-left text-xs font-bold uppercase text-gray-700">Prénom</th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                  <xsl:for-each select="etudiants/etudiant">
                    <tr class="hover:bg-blue-50 transition-colors duration-300">
                      <td class="px-6 py-3"><xsl:value-of select="@numInscription" /></td>
                      <td class="px-6 py-3"><xsl:value-of select="@nom" /></td>
                      <td class="px-6 py-3"><xsl:value-of select="@prenom" /></td>
                    </tr>
                  </xsl:for-each>
                </tbody>
              </table>
            </div>
          </section>

          <section>
            <h2 class="text-2xl font-bold text-blue-700 mb-6 flex items-center">
              <i class="fi fi-rr-books mr-3 text-blue-500 text-2xl"></i>
              Modules
            </h2>
            
            <ul class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <xsl:for-each select="modules/module">
                <li class="bg-gradient-to-br from-blue-100 via-white to-blue-100 p-5 rounded shadow hover:shadow-md transition-all duration-300 border border-slate-200">
                  <div class="flex items-center space-x-4">
                    <span class="inline-flex items-center justify-center w-12 h-12 rounded bg-blue-500 text-white text-lg font-bold">
                      <xsl:value-of select="@idModule" />
                    </span>
                    <span class="text-lg font-semibold text-gray-800">
                      <xsl:value-of select="@nomModule" />
                    </span>
                  </div>
                </li>
              </xsl:for-each>
            </ul>
          </section>

        </div>

      </body>
    </html>
  </xsl:template>
</xsl:stylesheet>