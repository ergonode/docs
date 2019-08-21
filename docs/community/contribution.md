# Ergonode Contributing Guide

Yoo! We're really excited that you are interested in contributing to Ergonode. <br>
As a contributor, here are the guidelines we would like you to follow.

## Code of Conduct
---
Please read and follow our [Code of Conduct][coc].


## Contributing to Ergonode code
---

Contributions to the Ergonode codebase are done using the fork & pull model.
This contribution model has contributors maintaining their own copy of the forked codebase (which can easily be synced with the main copy). The forked repository is then used to submit a request to the base repository to “pull” a set of changes.

Contributions can take the form of new components or features, changes to existing features, tests, documentation (such as developer guides, user guides, examples, or specifications), bug fixes or optimizations.

The Ergonode development team will review all issues and contributions submitted by the community of developers in the first in, first out order. During the review we might require clarifications from the contributor.


### Contribution requirements
---

1. Contributions must adhere to the [Coding standards](frontend/quality?id=coding-standards).

2. Pull requests (PRs) must be accompanied by a meaningful description of their purpose. Comprehensive descriptions increase the chances of a pull request being merged quickly and without additional clarification requests. Description can be delivered as an issue linked to PR.

3. PRs which include bug fixes must be accompanied with a step-by-step description of how to reproduce the bug. This also can be delivered as a linked issue.

4. PRs which include new logic or new features must be submitted along with:
    
    a. Unit/integration [test](frontend/quality?id=tests) coverage.

    b. PRD - Product Requirement Document that contains all necessary background of purpose and proposed implementations.

5. For larger features or changes, please consider opening an issue to discuss the proposed changes prior to development. This may prevent duplicate or unnecessary effort and allow other contributors to provide input.

### Contribution process
---

1. Search current **product requirements** and **listed issues** (open or closed) for similar proposals of intended contribution before starting work on a new contribution.

2. Fork the Ergonode repository.

3. Create and test your work.

4. When you are ready send a pull request.

5. Once your contribution is received the Ergonode development team will review the contribution and collaborate with you as needed.


## Got a Question or Problem?
---
**Do not open issues for general support questions as we want to keep GitHub issues for bug reports and feature requests.** 
You've got much better chances of getting your question answered on our [slack][slack] channel.


## Found a Bug?
---
If you find a bug in the source code, you can help us by submitting an issue to our [GitHub Repository][github] or send message on [slack][slack].

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

[coc]: community/code_of_conduct.md
[cc]: community/commit_convention.md
[github]: https://github.com/ergonode
[slack]: https://ergonode.slack.com/
