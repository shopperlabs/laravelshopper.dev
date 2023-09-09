#!/bin/bash
base=${base:-/home/forge/laravelshopper.dev}
docs=${base}/resources/docs

cd ${docs}/1.x && git pull origin 1.x
cd ${docs}/2.x && git pull origin 2.x
cd ${docs}/main && git pull origin main
