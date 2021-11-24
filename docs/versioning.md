# Versioning

Versioning in the Ergonode is followed by [semver] principles. In short both [backend](backend.md) and [frontend](frontend.md) applications are synchronized at the **MAJOR.MINOR** level, meaning: 

:heavy_check_mark: **Will work**
- 1.1.5 BE + 1.1.2 FE
- 1.1.0 BE + 1.1.0 FE
- 1.1.0 BE + 1.1.2 FE
- 1.1.2 BE + 1.1.2 FE

:x: **Will not work!!**
- 1.1.0 BE + 1.0.0 FE
- 1.0.3 BE + 1.1.2 FE

#### Supported versions

Ergonode core team is supporting only **2 MINOR versions** meaning having versions 1.2.0 as currently released, only **1.2.X** and **1.1.X** will be provided with patches.

#### Patching

We might consider few situations:
- Bug is only present in current version of FE, the patch will be released by increasing version from 1.2.0 => 1.2.1 for FE - the BE will stay at 1.2.0
- Bug is present within each supported version, the patch will be released for 1.2.0 => 1.2.1 and 1.1.0 => 1.1.1 FE + BE

[semver]: https://semver.org/

