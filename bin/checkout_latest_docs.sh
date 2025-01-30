#!/bin/bash

DOCS_VERSIONS=(
  2.x
  1.x
)

for v in "${DOCS_VERSIONS[@]}"; do
    mkdir -p "public/screenshots/$v"

    if [ -d "resources/docs/$v" ]; then
        echo "Pulling latest documentation updates for $v..."
        (cd resources/docs/$v && git pull)
    else
        echo "Cloning $v..."
        git clone --single-branch --branch "$v" https://github.com/shopperlabs/docs "resources/docs/$v"
    fi;

    if [ -d "resources/docs/$v/screenshots" ]; then
        cp -r "resources/docs/$v/screenshots/"* "public/screenshots/$v/"
    fi

    rm -rf "resources/docs/$v/screenshots"
done
