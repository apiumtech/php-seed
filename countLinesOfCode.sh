#!/usr/bin/env bash
folder=${1:-./DigitalPersonaTest.git}
echo -n "$folder: "
#for file in $(git --git-dir="$folder" ls-tree --name-only -r HEAD); do git --git-dir="$folder" show HEAD:"$file" | grep -v "^\s+'.*"; done | wc -l


