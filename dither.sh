#!/bin/bash

magick $1 -coalesce -resize 300x -colors 64 -ordered-dither o8x8 -layers OptimizeFrame $2
