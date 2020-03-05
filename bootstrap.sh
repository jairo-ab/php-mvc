#!/bin/bash
################################################################################
#                                                                              #
# bootstrap.sh                                                                #
#                                                                              #
# Autor: Lucas Saliés Brum a.k.a. sistematico <lucas@archlinux.com.br>         #
#                                                                              #
# Criado em: 30-11-2019 12:43:15 am                                            #
# Modificado em: 15-12-2019 11:33:52 am                                        #
#                                                                              #
# Este trabalho está licenciado com uma Licença Creative Commons               #
# Atribuição 4.0 Internacional                                                 #
# http://creativecommons.org/licenses/by/4.0/                                  #
#                                                                              #
################################################################################


if ls ${HOME}/htdocs/* > /dev/null 2> /dev/null; then
    read -p "Diretório ${HOME}/htdocs não vazio, deseja remover todos os arquivos? [s/N] " resp
    if [[ $resp == [sS]* ]]; then
        mv ${HOME}/htdocs /tmp/htdocs-$$
        mkdir ${HOME}/htdocs
    else
        echo "Abortando..."
        exit
    fi
fi

if [ ! -d /tmp/mvc ]; then
    git clone https://github.com/sistematico/php-mvc /tmp/mvc
fi
rm -rf /tmp/mvc/README.md /tmp/mvc/mvc.png /tmp/mvc/LICENSE /tmp/mvc/.gitignore /tmp/mvc/.git

mv /tmp/mvc/* ${HOME}/htdocs/
