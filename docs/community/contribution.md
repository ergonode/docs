# Ergonode Contributing Guide

Yoo! We're really excited that you are interested in contributing to Ergonode. <br>
As a contributor, here are the guidelines we would like you to follow.


## Code of Conduct
---

As contributors and maintainers of this project, we pledge to respect all people who contribute through reporting issues, posting feature requests, updating documentation, submitting pull requests or patches, and other activities.

We are committed to making participation in this project a harassment-free experience for everyone, regardless of the level of experience, gender, gender identity and expression, sexual orientation, disability, personal appearance, body size, race, age, or religion.

Examples of unacceptable behavior by participants include the use of sexual language or imagery, derogatory comments or personal attacks, trolling, public or private harassment, insults, or other unprofessional conduct.

Project maintainers have the right and responsibility to remove, edit, or reject comments, commits, code, wiki edits, issues, and other contributions that are not aligned to this Code of Conduct. Project maintainers who do not follow the Code of Conduct may be removed from the project team.

Instances of abusive, harassing, or otherwise unacceptable behavior may be reported by opening an issue or contacting one or more of the project maintainers.

This Code of Conduct is adapted from the [Contributor Covenant](http://contributor-covenant.org), version 1.0.0, available at [http://contributor-covenant.org/version/1/0/0/](http://contributor-covenant.org/version/1/0/0/)


## Got a Question or Problem?
---
**Do not open issues for general support questions as we want to keep GitHub issues for bug reports and feature requests.** 
You've got much better chances of getting your question answered on our [slack][slack] channel.


## Found a Bug?
---
If you find a bug in the source code, you can help us by [submitting an issue](#submit-issue) to our [GitHub Repository][github] or send message on [slack][slack].

## Coding Rules
---
To ensure consistency throughout the source code, keep these rules in mind as you are working:

* All features or bug fixes **must be tested** by one or more specs (unit-tests).
* All changes should involve updating the **documentation**.


## Pull Request Guidelines
---
- The `master` branch is just a snapshot of the latest stable release. All development should be done in dedicated branches. **Do not submit PRs against the `master` branch.**

- Checkout a topic branch from the relevant branch, e.g. `develop`, and merge back against that branch.

- It's OK to have multiple small commits as you work on the PR.

- Make sure `npm run test` passes.

- If adding a new feature:
  - Add accompanying test case.
  - Provide a convincing reason to add this feature. Ideally, you should open a suggestion issue first and have it approved before working on it.

- If fixing bug:
  - If you are resolving a special issue, add `(fix #xxxx[,#xxxx])` (#xxxx is the issue id) in your PR title for a better release log, e.g. `update entities encoding/decoding (fix #1234)`.
  - Provide a detailed description of the bug in the PR. Live demo preferred.
  - Add appropriate test coverage if applicable.

## Committing Changes
---
Commit messages should follow the [commit message convention][cc].

## Credits

Thank you to all the people who have already contributed to Ergonode!

[coc]: ./CODE_OF_CONDUCT.md
[cc]: ./COMMIT_CONVENTION.md
[github]: https://github.com/ergonode/frontend
[submit-issue]: https://github.com/ergonode/frontend/issues
[slack]: https://ergonode.slack.com/
