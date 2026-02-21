#!/bin/bash

magick $1 -resize 300x -colors 64 -ordered-dither o8x8 $2
