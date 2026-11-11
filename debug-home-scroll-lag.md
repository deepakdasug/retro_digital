# Debug Session: home-scroll-lag
- **Status**: [FIXED]
- **progress_status**: verified
- **Issue**: The home page stuttered while scrolling through the services cards and mid-page estimator.
- **Evidence Source**: HTTP Debug Server plus in-page requestAnimationFrame measurements
- **Evidence Directory**: C:\Users\Deepak Kumar\AppData\Local\Temp\retro_digital1-home-scroll-lag
- **Log File**: C:\Users\Deepak Kumar\AppData\Local\Temp\retro_digital1-home-scroll-lag\trae-debug-log-home-scroll-lag.ndjson

## Reproduction Steps
1. Open the local homepage at a 564x588 viewport.
2. Run a continuous 12-second Lenis scroll from the hero through the bento services cards and mid-page CTA.
3. Measure requestAnimationFrame gaps and record scroll-handler, animation, video-visibility, and resource events.

## Instrumentation Points
- `main.js:handleVideoScroll` duration and invocation count.
- `PerformanceObserver.longtask` and section animation state.
- `PerformanceObserver.resource` and video visibility state.
- Browser-side continuous requestAnimationFrame gap sampler.

## Hypotheses & Verification
| ID | Hypothesis | Likelihood | Effort | Evidence |
|----|------------|------------|--------|----------|
| A | The video docking handler does excessive per-frame layout work. | High | Low | REJECTED: handler averages stayed below 0.6ms; max observed 1.5ms (pre-fix lines 8, 12, 17, 21). |
| B | Lenis and native scroll paths duplicate per-frame callbacks. | Medium | Medium | REJECTED: native and Lenis event counts matched during the continuous pass; one handler rAF ran per event (post-fix lines 23-28). |
| C | Persistent visual work in the marked sections causes rendering pressure. | High | Medium | CONFIRMED: off-screen sections retained animations before the fix (pre-fix lines 5-6, 18); scoped header blur and off-screen motion were reduced. |
| D | Off-screen video decode and a large section image add avoidable work. | Medium | Medium | CONFIRMED: video was playing off-screen (pre-fix line 23); MedTech image changed from 759KB JPEG to 106KB WebP (post-fix line 19). |

## Log Evidence
The pre-fix continuous pass recorded 4 frame gaps above 50ms, including 2 above 100ms; maximum 133.3ms. After pausing off-screen video and motion and reducing the JPEG payload, one pass still recorded 2 gaps above 50ms (maximum 131.6ms). Removing the scrolled-home header blur and pausing its pseudo-element loop reduced the next two equivalent passes to 0 gaps above 50ms, with maxima of 36.6ms and 29.3ms (721 frames in the repeat pass).

## Verification Conclusion
The hero video paused when out of view and resumed when returning to the top. The services filter and Live Benchmark interaction still worked. The browser selected the WebP source; its transfer was 106,210 bytes versus the pre-fix JPEG's 759,273 bytes. No long tasks were recorded during the continuous scroll passes; observed long tasks were during initial page startup.

## Final Evidence Gate
- **Evidence Sources**: `C:\Users\Deepak Kumar\AppData\Local\Temp\retro_digital1-home-scroll-lag\pre-fix-baseline.ndjson`, `C:\Users\Deepak Kumar\AppData\Local\Temp\retro_digital1-home-scroll-lag\trae-debug-log-home-scroll-lag.ndjson`, and three browser-side continuous 12-second frame samples.
- **progress_status**: verified
- **Hypothesis Conclusions**: A REJECTED; B REJECTED; C CONFIRMED; D CONFIRMED.
