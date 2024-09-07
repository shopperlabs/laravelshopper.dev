#!/bin/bash

DOCS_VERSIONS=(
  2.x
  1.x
)

for v in "${DOCS_VERSIONS[@]}"; do
    if [ -d "resources/docs/$v" ]; then
        echo "Pulling latest documentation updates for $v..."
        (cd resources/docs/$v && git pull)
        mv "./$v/screenshots/*" "../public/screenshots/$v"
    else
        echo "Cloning $v..."
        git clone --single-branch --branch "$v" https://github.com/shopperlabs/docs "resources/docs/$v"
        mv "resources/docs/$v/screenshots" "public/screenshots/$v"
    fi;
done
