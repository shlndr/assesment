Question:

There exists two images (or canvas) with width W > 0 and height H > 0.

e.g. imageA = {Width: 100, Height: 300} and imageB = {Width: 150, Height: 600}.

imageB needs to fit into imageA by 2 strategies/modes, contain and cover. Upsizing imageB is not allowed. Images must keep aspect ratio.

  Contain: fits imageB fully so that not piece of imageB is outside imageA. imageB can be downsized, but not upsized.
  Cover: fits imageA as much as possible, imageB and have parts outside imageA, imageB cannot be upsized.